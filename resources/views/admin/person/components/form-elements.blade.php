<div class="form-group row align-items-center" :class="{'has-danger': errors.has('person_fname'), 'has-success': this.fields.person_fname && this.fields.person_fname.valid }">
    <label for="person_fname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">First Name</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.person_fname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('person_fname'), 'form-control-success': this.fields.person_fname && this.fields.person_fname.valid}" id="person_fname" name="person_fname" placeholder="{{ trans('admin.person.columns.person_fname') }}">
        <div v-if="errors.has('person_fname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('person_fname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('person_lname'), 'has-success': this.fields.person_lname && this.fields.person_lname.valid }">
    <label for="person_lname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Last Name</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.person_lname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('person_lname'), 'form-control-success': this.fields.person_lname && this.fields.person_lname.valid}" id="person_lname" name="person_lname" placeholder="{{ trans('admin.person.columns.person_lname') }}">
        <div v-if="errors.has('person_lname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('person_lname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('person_gender'), 'has-success': this.fields.person_gender && this.fields.person_gender.valid }">
    <label for="person_gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Gender</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.person_gender" @input="validate($event)" :class="{'form-control-danger': errors.has('person_gender'), 'form-control-success': this.fields.person_gender && this.fields.person_gender.valid}" id="person_gender" name="person_gender">
            <option v-bind:value="'male'">Male</option>
            <option v-bind:value="'female'">Female</option>
        </select>
        <div v-if="errors.has('person_gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('person_gender') }}</div>
    </div>
</div>

@component('input-element', ['field' => 'address', 'label' => 'Address'])
@endcomponent

@component('input-element', ['field' => 'postal_code', 'label' => 'Postcode'])
@endcomponent

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mobile_no'), 'has-success': this.fields.mobile_no && this.fields.mobile_no.valid }">
    <label for="mobile_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.mobile_no') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mobile_no" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mobile_no'), 'form-control-success': this.fields.mobile_no && this.fields.mobile_no.valid}" id="mobile_no" name="mobile_no" placeholder="{{ trans('admin.person.columns.mobile_no') }}">
        <div v-if="errors.has('mobile_no')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mobile_no') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': this.fields.email && this.fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': this.fields.email && this.fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.person.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>


