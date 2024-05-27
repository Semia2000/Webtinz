@extends('layouts_app.cloudlayout')
@section('links')

@endsection
@section('content')
<section class="d-flex flex-column justify-content-center align-items-center mb-5">
    <div class="text-center mt-5 mb-5">
        <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="">
    </div>
    <div class="listtemplates container" style="background-color:white">
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <h3>Choose Template</h3>
            <p class="text-center">Select your templates based upon your requirements </p>
            <div class="input-group rounded mt-3 mb-3" style="width: 50%">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($templates as $template)
            <div class="col mt-5">
                <div class="card template-card" data-template-id="{{ $template->id }}" 
                     data-template-name="{{ $template->name }}" 
                     data-template-price="{{ $template->price }}">
                    <img class="" src="{{ asset('storage/' . $template->thumbnail) }}" width="100%" alt="">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="me-auto">{{ $template->name }}</h4>
                            <h4 class="templateprice ms-auto">
                                @if ($template->price === null)
                                FCFA 00
                                @else
                                FCFA {{ $template->price }}
                                @endif
                            </h4>
                        </div>
                        <p>By {{ $template->createby }}</p>
                        <a  href="">{{ $template->typetemplate }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-5 pb-0">
            <hr>
        </div>

        <div id="selected-template-info" class="text-center flex-column d-flex justify-content-center align-items-center mb-5">
            <p>Selected Template </p>
            <h3 id="selected-template-name">None</h3>
            <h5 id="selected-template-price">Price : FCFA 00</h5>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="termsandconditions" required>
                <label class="form-check-label" for="termsandconditions">
                    I accept <span style="color:#F05940">terms of use</span> & <span style="color:#F05940">Policy</span>
                </label>
            </div>
            <a href="{{ route('payement') }}">Continue</a>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const templateCards = document.querySelectorAll('.template-card');
    const selectedTemplateName = document.getElementById('selected-template-name');
    const selectedTemplatePrice = document.getElementById('selected-template-price');
    const acceptCheckbox = document.getElementById('termsandconditions');

    templateCards.forEach(function(card) {
        card.addEventListener('click', function() {
            templateCards.forEach(function(c) {
                c.classList.remove('active', 'border-danger');
            });
            this.classList.add('active', 'border-danger');

            const templateId = this.dataset.templateId;
            const templateName = this.dataset.templateName;
            const templatePrice = this.dataset.templatePrice === '' ? '00' : this.dataset.templatePrice;

            selectedTemplateName.textContent = templateName;
            selectedTemplatePrice.textContent = `Price : FCFA ${templatePrice}`;

            // Envoyer une requête AJAX pour enregistrer le modèle sélectionné
            saveSelectedTemplate(templateId, templateName, templatePrice);
        });
    });

    acceptCheckbox.addEventListener('change', function() {
        if (!this.checked) {
            alert('Please accept the terms and conditions.');
        }
    });

    function saveSelectedTemplate(templateId) {
        // Envoyer une requête AJAX pour enregistrer le modèle sélectionné dans la base de données
        // Vous devez remplacer cette section avec la logique de votre backend pour enregistrer les détails du modèle
        // par exemple, en utilisant Fetch API ou Axios
        console.log(`Template ID: ${templateId}`);
    }
});

</script>
@endsection
