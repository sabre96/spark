Vue.component('update-profile-details', {
    props: ['user'],

    data() {
        return {
            form: new SparkForm({
                type:        '',
                ending_on:   '',
                firstName:   '',
                lastName:    '',
                companyName: '',
                email:       '',
                streetName:  '',
                houseNumber: '',
                zipCode:     '',
                city:        '',
                country:     '',
                phone:       '',
                mobile:      '',
                btw:         '',
                kvk:         '',
            })
        };
    },

    ready() {
        this.form.type        = this.user.type;
        this.form.ending_on   = this.user.ending_on;
        this.form.firstName   = this.user.firstName;
        this.form.lastName    = this.user.lastName;
        this.form.companyName = this.user.companyName;
        this.form.email       = this.user.email;
        this.form.streetName  = this.user.streetName;
        this.form.houseNumber = this.user.houseNumber;
        this.form.zipCode     = this.user.zipCode;
        this.form.city        = this.user.city;
        this.form.country     = this.user.country;
        this.form.phone       = this.user.phone;
        this.form.mobile      = this.user.mobile;
        this.form.btw         = this.user.btw;
        this.form.kvk         = this.user.kvk;
    },

    methods: {
        update() {
            Spark.put('/settings/profile/details', this.form)
                 .then(response => {
                     this.$dispatch('updateUser');
                 });
        }
    }
});