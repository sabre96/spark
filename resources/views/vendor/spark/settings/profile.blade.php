<spark-profile :user="user" inline-template>
    <div>
        <!-- Update Profile Photo -->
        @include('spark::settings.profile.update-profile-photo')

        <!-- Update Profile Details -->
        @include('settings.profile.update-profile-details')
    </div>
</spark-profile>
