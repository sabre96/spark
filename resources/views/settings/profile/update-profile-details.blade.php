<update-profile-details :user="user" inline-template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Profile details</div>
            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="form.successful">
                    Your profile has been updated!
                </div>

                <form role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- start row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('type')}">
                            <label for="type" class="control-label">Type</label>
                            <select onchange="typeSelect(this);" class="form-control" name="type" id="type"
                                    v-model="form.type">
                                <option value="">
                                    -- Choose user type --
                                </option>
                                <option value="Guest" {{ $user->type == 'Guest' ? 'selected' : '' }}>
                                    Guest
                                </option>
                                <option value="Company" {{ $user->type == 'Company' ? 'selected' : '' }}>
                                    Company
                                </option>
                                <option value="Contact person" {{ $user->type == 'Contact person' ? 'selected' : '' }}>
                                    Contact person
                                </option>
                                <option value="Admin" {{ $user->type == 'Admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                            </select>

                            <span class="help-block" v-show="form.errors.has('type')">
                                @{{ form.errors.get('type') }}
                            </span>
                        </div>
                        <div id="ending_onDiv" class="form-group col-xs-6"
                             :class="{'has-error': form.errors.has('ending_on')}" hidden>
                            <label for="ending_on" class="control-label">End date</label>
                            <input type="date" class="form-control" id="ending_on" name="ending_on"
                                   value="{{ $user->ending_on}}" v-model="form.ending_on">

                            <span class="help-block" v-show="form.errors.has('ending_on')">
                                        @{{ form.errors.get('ending_on') }}
                            </span>
                        </div>
                    </div>
                    <!-- end row -->
                    <br/>
                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('firstName')}">
                            <label for="firstName" class="control-label">First name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName"
                                   value="{{ $user->firstName}}" v-model="form.firstName" placeholder="Max. 50 long">

                            <span class="help-block" v-show="form.errors.has('firstName')">
                                    @{{ form.errors.get('firstName') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('lastName')}">
                            <label for="lastName" class="control-label">Last name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                   value="{{ $user->lastName}}" v-model="form.lastName" placeholder="Max. 50 long">

                            <span class="help-block" v-show="form.errors.has('lastName')">
                                    @{{ form.errors.get('lastName') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->

                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('companyName')}">
                            <label for="companyName" class="control-label">Company name</label>
                            <input type="text" class="form-control" name="companyName" id="companyName"
                                   value="{{ $user->companyName}}" v-model="form.companyName"
                                   placeholder="Max. 100 long, unique">

                            <span class="help-block" v-show="form.errors.has('companyName')">
                                    @{{ form.errors.get('companyName') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('email')}">
                            <label for="email" class="control-label">E-mail address</label>
                            <input type="text" class="form-control" name="email" id="email"
                                   value="{{ $user->email}}" v-model="form.email"
                                   placeholder="Valid e-mail, unique">

                            <span class="help-block" v-show="form.errors.has('email')">
                                    @{{ form.errors.get('email') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->
                    <br/>
                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('streetName')}">
                            <label for="streetName" class="control-label">Street</label>
                            <input type="text" class="form-control" name="streetName" id="streetName"
                                   value="{{ $user->streetName}}" v-model="form.streetName" placeholder="Max. 100 long">

                            <span class="help-block" v-show="form.errors.has('streetName')">
                                    @{{ form.errors.get('streetName') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('houseNumber')}">
                            <label for="houseNumber" class="control-label">House number</label>
                            <input type="text" class="form-control" name="houseNumber" id="houseNumber"
                                   value="{{ $user->houseNumber}}" v-model="form.houseNumber"
                                   placeholder="Max. 11 long">

                            <span class="help-block" v-show="form.errors.has('houseNumber')">
                                    @{{ form.errors.get('houseNumber') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->

                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('zipCode')}">
                            <label for="zipCode" class="control-label">Zip code</label>
                            <input type="text" class="form-control" name="zipCode" id="zipCode"
                                   value="{{ $user->zipCode}}" v-model="form.zipCode" placeholder="Max. 10 long">

                            <span class="help-block" v-show="form.errors.has('zipCode')">
                                    @{{ form.errors.get('zipCode') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('city')}">
                            <label for="city" class="control-label">City</label>
                            <input type="text" class="form-control" name="city" id="city"
                                   value="{{ $user->city}}" v-model="form.city" placeholder="Max. 100 long">

                            <span class="help-block" v-show="form.errors.has('city')">
                                    @{{ form.errors.get('city') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->

                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('country')}">
                            <label for="country" class="control-label">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                   value="{{ $user->country}}" v-model="form.country" placeholder="Max. 100 long">

                            <span class="help-block" v-show="form.errors.has('country')">
                                    @{{ form.errors.get('country') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->
                    <br/>
                    <!-- start form row -->
                    <div class="row">
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('phone')}">
                            <label for="phone" class="control-label">Phone number</label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                   value="{{ $user->phone}}" v-model="form.phone" placeholder="Max. 15 long">

                            <span class="help-block" v-show="form.errors.has('phone')">
                                    @{{ form.errors.get('phone') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('mobile')}">
                            <label for="mobile" class="control-label">Mobile</label>
                            <input type="number" class="form-control" name="mobile" id="mobile"
                                   value="{{ $user->mobile}}" v-model="form.mobile" placeholder="Max. 15 long">

                            <span class="help-block" v-show="form.errors.has('mobile')">
                                    @{{ form.errors.get('mobile') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->
                    <br/>
                    <!-- start form row -->
                    <div id="companyRow" class="row" hidden>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('kvk')}">
                            <label for="kvk" class="control-label">KVK</label>
                            <input type="number" class="form-control" name="kvk" id="kvk"
                                   value="{{ $user->kvk}}" v-model="form.kvk" placeholder="Must be 8 long, unique">

                            <span class="help-block" v-show="form.errors.has('kvk')">
                                    @{{ form.errors.get('kvk') }}
                                </span>
                        </div>
                        <div class="form-group col-xs-6" :class="{'has-error': form.errors.has('btw')}">
                            <label for="btw" class="control-label">BTW</label>
                            <input type="text" class="form-control" name="btw" id="btw"
                                   value="{{ $user->btw}}" v-model="form.btw" placeholder="Max. 15 long, unique">

                            <span class="help-block" v-show="form.errors.has('btw')">
                                    @{{ form.errors.get('btw') }}
                                </span>
                        </div>
                    </div>
                    <!-- end form row -->

                    <!-- Update Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-profile-details>
<script src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous">
</script>
<script>
    @if ($user->type == "Company")
        $('#ending_onDiv').show();
        $('#companyRow').show();
    @elseif ($user->type == "Contact person")
            $('#ending_onDiv').show();
    @endif


    function typeSelect() {
        var typeSelectList = $('select#type');
        var selectedValue  = $('option:selected', typeSelectList).val();

        if (selectedValue == "Company" || selectedValue == "Contact person") {
            if (selectedValue == "Contact person") {
                $('#ending_onDiv').show(1000);
                $('#kvk').val('');
                $('#btw').val('');

                $('#companyRow').hide(1000);
            } else {
                $('#ending_onDiv').show(1000);
                $('#companyRow').show(1000);
            }
        } else {
            $('#ending_on').val('');
            $('#ending_onDiv').hide(1000);

            $('#kvk').val('');
            $('#btw').val('');

            $('#companyRow').hide(1000);
        }

    }
    $(function () {
        $('select#type').change(typeSelect);
    });
</script>

