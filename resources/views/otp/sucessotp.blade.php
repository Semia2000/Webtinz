@extends('layouts_app.cloudlayout')
@section('links')
<style>
    .section-center {
    display: block;
    position: absolute;
    align-items: center;
    justify-content: center;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);

}

.section-center .finalVerification {
    margin: 0 auto;
}

.verification-text {
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 45px;
    color: #274060;
}

.connexionButton {
    background: #274060;
    border-radius: 10px;
    width: 250px;
    height: 46px;
}

.connexionButtonText {


    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    color: #FFFFFF;


}

.connexionButtonText:hover {
    color: #FFFFFF;
}
</style>
@endsection
@section('content')
    <section class="section-center" >
        <div class="card p-5">
        <div class=" mt-5 container finalVerification">
            <p>
                <span class="verification-text">
                    Vérification réussie !</span> <span>
                    <img src="{{ asset('assets/images/verification.png') }}" alt="">
                </span>
            </p>
            <p class="mt-2 text-center">
                Votre compte a été créé avec succès.
            </p>
            <div class="text-center">
                <img src="{{ asset('assets/images/Rectangle43.png') }}" alt="">
            </div>
            <div class=" text-center">
                <button class="connexionButton">

                      <a class="connexionButtonText" href="{{ route('letstart') }}">
                        Continuer
                      </a>
                   
                </button>

            </div>
        </div>
        </div>

    </section>
@endsection
@section('js')
@endsection