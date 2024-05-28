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
            <div class="input-group position-relative mt-3 mb-3" style="width: 50%; background:#F8F8F8">
                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <i class="bi bi-search position-absolute top-50 end-0 me-2 translate-middle-y" style="pointer-events: none;"></i>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($templates as $template)
            <div class="col mt-5">
                <div class="card template-card" data-template-id="{{ $template->id }}" 
                     data-template-name="{{ $template->name }}" 
                     data-template-price="{{ $template->price }}">
                    <img class="" src="{{ asset('storage/' . $template->thumbnail) }}" width="100%" alt="">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
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
                        <span>{{ $template->typetemplate }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="p-5 pb-0">
            <hr>
        </div>

        <div id="selected-template-info" class="text-center flex-column d-flex justify-content-center align-items-center mb-5">
            <p>Selected Template</p>
            <h3 id="selected-template-name">None</h3>
            <h5 id="selected-template-price">Price : FCFA 00</h5>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="termsandconditions" required>
                <label class="form-check-label" for="termsandconditions">
                    I accept <span style="color:#F05940">terms of use</span> & <span style="color:#F05940">Policy</span>
                </label>
            </div>
            <form id="template-form" action="{{ route('saveTemplateSelection') }}" method="POST">
                @csrf
                <input type="hidden" name="website_id" id="website_id" value="{{ $website->id }}">
                <input type="hidden" name="template_id" id="selected-template-id">
                <button type="su" id="continue-button" >Continue</button>
            </form>
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
    const selectedTemplateIdInput = document.getElementById('selected-template-id');
    const acceptCheckbox = document.getElementById('termsandconditions');
    const continueButton = document.getElementById('continue-button');

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
            selectedTemplateIdInput.value = templateId;

            // Enregistrer le template sélectionné (optionnel)
            saveSelectedTemplate(templateId);
        });
    });

    continueButton.addEventListener('click', function() {
        if (!acceptCheckbox.checked) {
            alert('You must accept the terms and conditions before continuing.');
            return;
        }
        document.getElementById('template-form').submit();
    });

    function saveSelectedTemplate(templateId) {
        // Requête AJAX pour enregistrer le modèle sélectionné (optionnel)
        fetch('{{ route('saveTemplateSelection') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                template_id: templateId
            })
        }).then(response => response.json())
          .then(data => {
              console.log('Template saved:', data);
          })
          .catch(error => {
              console.error('Error saving template:', error);
          });
    }
});
</script>
@endsection
