@extends('dashboarduser.layoutuser')
@section('links')
@endsection
@section('content')
    <section>
        <div class="row p-5">
            <div class="dash whitepage p-5">
                <div class="text-left">
                    <h2>Company Contact Info</h2>
                    <p>Provide company contact information
                    </p>
                    <form>
                        <div class="row mt-3 mb-4 g-3">
                            <label for="company_name">First URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control " id="company_name"
                                    placeholder="https//www.yourdomainname.com">
                            </div>
                        </div>

                        <div class="row mt-3 mb-4 g-3">
                            <label for="company_name">Second URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control " id="company_name"
                                    placeholder="https//www.yourdomainname.com">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
