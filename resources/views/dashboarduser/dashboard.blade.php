@extends('dashboarduser.layoutuser')
@section('links')
@endsection
@section('content')
    <section class="dashboard container p-5">
        <div class="row row-cols-1 row-cols-md-4 ">
            <div class="col">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
            </div>
        </div>
        <div class="row tablestat mt-3">
            <div class="col-8 ms-2 p-5">
                <h4>Payment History</h4>
                <hr>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Amount</th>
                                <th>Date & Time</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                            <tr>
                                <td>processed</td>
                                <td>FCFA 5000</td>
                                <td>03/34/2024,13:23</td>
                                <td>Payment by Paypal</td>
                                <td>view</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="pagination">
                    <a href="#" class="prev">2</a>
                    <a href="#" class="prev">1</a>
                    <a href="#" class="next"><i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-3 ms-4 d-flex flex-column justify-content-center align-items-center  graphics">
                <div class="row row-cols-1 row-cols-md-4">
                    <div class="col bar me-3">
                        <div class="level" style="height: 70%;"></div>
                    </div>
                    <div class="col bar me-3">
                        <div class="level" style="height: 50%;"></div>
                    </div>
                    <div class="col bar me-3">
                        <div class="level" style="height: 80%;"></div>
                    </div>
                </div>
                <p class="text-center">Your sales performance
                    is <span style="color: #F05940">30%
                        better</span> compare to
                    last month</p>
            </div>
        </div>

    </section>
@endsection
@section('js')
@endsection
