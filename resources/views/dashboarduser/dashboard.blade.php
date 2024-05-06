@extends('dashboarduser.layoutuse')
@section('links')
@endsection
@section('content')
    <section class="dashboard  p-5">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row statnumber">
              <div class="col col-12 col-md-6 col-lg-3">
                <div class="card  pt-5 pb-2 p-4">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
              </div>

              <div class="col col-12 col-md-6 col-lg-3">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
              </div>


              <div class="col col-12 col-md-6 col-lg-3">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
              </div>

              <div class="col col-12 col-md-6 col-lg-3">
                <div class="card p-4 pt-5 pb-2">
                    <h5>12 <span>Months</span></h5>
                    <hr>
                    <p>Template display</p>
                </div>
              </div>
            </div>

            <div class="row tablestat">
                <!-- Left col -->
                <div class="col-9 tableforstat p-5">
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
                                    <td><span style="color: red; font-size: 10px;">●</span> processed</td>
                                    <td>FCFA 5000</td>
                                    <td>03/34/2024,13:23</td>
                                    <td>Payment by Paypal</td>
                                    <td>view</td>
                                </tr>
                                <tr>
                                    <td><span style="color: green; font-size: 10px;">●</span> processed</td>
                                    <td>FCFA 5000</td>
                                    <td>03/34/2024,13:23</td>
                                    <td>Payment by Paypal</td>
                                    <td>view</td>
                                </tr>
                                <tr>
                                    <td><span style="color: green; font-size: 10px;">●</span> processed</td>
                                    <td>FCFA 5000</td>
                                    <td>03/34/2024,13:23</td>
                                    <td>Payment by Paypal</td>
                                    <td>view</td>
                                </tr>
                                <tr>
                                    <td><span style="color: yellow; font-size: 10px;">●</span> processed</td>
                                    <td>FCFA 5000</td>
                                    <td>03/34/2024,13:23</td>
                                    <td>Payment by Paypal</td>
                                    <td>view</td>
                                </tr>
                                <tr>
                                    <td><span style="color: green; font-size: 10px;">●</span> processed</td>
                                    <td>FCFA 5000</td>
                                    <td>03/34/2024,13:23</td>
                                    <td>Payment by Paypal</td>
                                    <td>view</td>
                                </tr>
                                <tr>
                                    <td><span style="color: red; font-size: 10px;">●</span> processed</td>
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
                <!-- /.col -->

                <div class="col chartstat d-flex flex-column align-items-center justify-content-center">
                    <div class="row">
                        <div class="col bar me-2">
                            <div class="level" style="height: 70%; width: 100%;"></div>
                        </div>
                        <div class="col bar me-2">
                            <div class="level" style="height: 50%; width: 100%;"></div>
                        </div>
                        <div class="col bar me-2">
                            <div class="level" style="height: 80%; width: 100%;"></div>
                        </div>
                    </div>
                    <p class="text-center">Your sales performance
                        is <span style="color: #F05940">30%
                            better</span> compare to
                        last month</p>
                </div>
                <!-- /.col -->
            </div>
        </div>


    </section>
@endsection
@section('js')
@endsection
