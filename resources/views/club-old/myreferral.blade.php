 <div class="tab-content">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">My Referral</h5>
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        @if(!empty($user->clubUsers) && $user->clubUsers->count())
                                        <tr>
                                            <th scope="col">SN</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Join Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($user->clubUsers as $key => $referral)
                                        <tr>
                                            <th scope="row">{{ ++$key }} </th>
                                            <td>{{ $referral->name }} </td>
                                            <td>{{ $referral->username }} </td>
                                            <td>{{ Carbon\Carbon::parse($referral->created_at)->format('d / M / Y h:i:s A') }}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <b> Referral not found!</b>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>