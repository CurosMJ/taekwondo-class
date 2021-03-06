<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Person\IndexPerson;
use App\Http\Requests\Admin\Person\StorePerson;
use App\Http\Requests\Admin\Person\UpdatePerson;
use App\Http\Requests\Admin\Person\DestroyPerson;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Person;

class PersonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPerson $request
     * @return Response|array
     */
    public function index(IndexPerson $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Person::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['*'],

            // set columns to searchIn
            ['id', 'person_fname', 'person_lname', 'address', 'postal_code', 'person_gender', 'email']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.person.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.person.create');

        return view('admin.person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePerson $request
     * @return Response|array
     */
    public function store(StorePerson $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Person
        $person = Person::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/people'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/people');
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $person
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Person $person)
    {
        $this->authorize('admin.person.show', $person);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person $person
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Person $person)
    {
        $this->authorize('admin.person.edit', $person);

        return view('admin.person.edit', [
            'person' => $person,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePerson $request
     * @param  Person $person
     * @return Response|array
     */
    public function update(UpdatePerson $request, Person $person)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Person
        $person->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/people'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/people');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPerson $request
     * @param  Person $person
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyPerson $request, Person $person)
    {
        $person->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
