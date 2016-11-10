@extends('spark::layouts.app')

@section('content')
<activity-log :user="user" inline-template>
    <div class="container">
        <!-- No Activity -->
        <div class="row" v-show="activitiesLoaded && activities.length == 0">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">No Activity</div>

                    <div class="panel-body">
                        Looks like you don't have any activity. Get to work!
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Log -->
        <div class="row" v-show="activities.length > 0">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Recent Activity</div>

                    <div class="panel-body">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th></th>
                                <th>Message</th>
                                <th>Date</th>
                            </thead>

                            <tbody>
                                <tr v-for="activity in activities">
                                    <!-- Photo -->
                                    <td>
                                        <img :src="activity.user.photo_url" class="spark-profile-photo">
                                    </td>

                                    <!-- Message -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ activity.message }}
                                        </div>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ activity.created_at | datetime }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</activity-log>
@endsection
