@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Task</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" v-model="form.name">

                                    <span class="help-block" v-show="form.errors.has('name')">
                                        @{{ form.errors.get('name') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Create Button -->
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-6">
                                    <button type="submit" class="btn btn-primary"
                                            @click.prevent="create"
                                            :disabled="form.busy">

                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="row" v-show="tasks.length > 0">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Tasks</div>

                    <div class="panel-body">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th>Name</th>
                                <th></th>
                            </thead>

                            <tbody>
                                <tr v-for="task in tasks">
                                    <!-- Name -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ task.name }}
                                        </div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <button class="btn btn-success" @click="delete(task)">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
