<form class="form-horizontal" role="form">
    <!-- Team Name -->
    @if (Spark::usesTeams())
        <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
            <label for="company" class="col-md-4 control-label">Company</label>

            <div class="col-md-6">
                <input id="company" type="name" class="form-control" name="team"
                       v-model="registerForm.team" placeholder="Max. 100 long" autofocus>

                <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>
@endif

<!-- First name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('firstName')}">
        <label for="firstName" class="col-md-4 control-label">First name</label>

        <div class="col-md-6">
            <input id="firstName" type="name" class="form-control" name="name" v-model="registerForm.firstName"
                   autofocus placeholder="Max. 50 long">

            <span class="help-block" v-show="registerForm.errors.has('firstName')">
                @{{ registerForm.errors.get('firstName') }}
            </span>
        </div>
    </div>

    <!-- Last name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('lastName')}">
        <label for="lastName" class="col-md-4 control-label">Last name</label>

        <div class="col-md-6">
            <input id="lastName" type="name" class="form-control" name="name" v-model="registerForm.lastName"
                   placeholder="Max. 50 long">

            <span class="help-block" v-show="registerForm.errors.has('lastName')">
                @{{ registerForm.errors.get('lastName') }}
            </span>
        </div>
    </div>

    <!-- E-Mail Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" v-model="registerForm.email"
                   placeholder="Valid e-mail, unique">

            <span class="help-block" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" v-model="registerForm.password"
                   placeholder="Max. 60 long">

            <span class="help-block" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
        <label for="confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="confirm" type="password" class="form-control" name="password_confirmation"
                   v-model="registerForm.password_confirmation" placeholder="Retype above">

            <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>
    <br/>
    <!-- User Type -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('type')}">
        <label for="type" class="col-md-4 control-label">Type</label>

        <div class="col-md-6">
            <select name="type" id="type" class="form-control" v-model="registerForm.type">
                <option value="" selected>-- Choose user type --</option>
                <option value="Guest">Guest</option>
                <option value="Contact person">Contact person</option>
                <option value="Admin">Admin</option>
            </select>

            <span class="help-block" v-show="registerForm.errors.has('type')">
                @{{ registerForm.errors.get('type') }}
            </span>
        </div>
    </div>

    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" v-model="registerForm.terms">
                        I Accept The <a href="/terms" target="_blank">Terms Of Service</a>
                    </label>

                    <span class="help-block" v-show="registerForm.errors.has('terms')">
                        @{{ registerForm.errors.get('terms') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Registering
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i>Register
                    </span>
                </button>
            </div>
        </div>
    </div>
</form>
