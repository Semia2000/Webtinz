@extends('layouts_app.cloudlayout')
@section('links')
    <style>
        .card {
            position: relative;
            cursor: pointer;
        }

        .card-checkbox {
            position: absolute;
            top: 0;
            right: 0;
            display: none;
        }

        .card.active .card-checkbox {
            display: block;
        }

        .card-checkbox input[type="checkbox"] {
            width: 25px;
            height: 25px;
            appearance: none;
            border: 2px solid #F05940;
            cursor: pointer;
            position: relative;
        }

        .card-checkbox input[type="checkbox"]::before {
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            background-color: #F05940;
        }

        .card-checkbox input[type="checkbox"]:checked::before {
            opacity: 1;
        }

        .card-checkbox input[type="checkbox"]::after {
            content: '';
            display: block;
            width: 8px;
            height: 14px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
            position: absolute;
            top: 4px;
            left: 9px;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .card-checkbox input[type="checkbox"]:checked::after {
            opacity: 1;
        }

        /*
                .template-list {
                    display: flex;
                    flex-wrap: wrap;
                }
                .template-item {
                    margin: 10px;
                }
                #loading {
                    display: none;
                    text-align: center;
                }
                iframe {
                    width: 100%;
                    height: 600px;
                    border: none;
                }
            */

        /* CSS personnalisé */
        @media (min-width: 100px) {
            .modal-lg {
                max-width: 97vw;
                margin-top: 5px !important;
            }
        }

        #btn-close {
            color: #F8F8F8 !important;
            background-color: red !important;
        }

        iframe {
            min-width: 100% !important;
            max-width: 100% !important;
            min-height: 89vh;
            margin: 0px !important;
        }
    </style>
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
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <i class="bi bi-search position-absolute top-50 end-0 me-2 translate-middle-y"
                        style="pointer-events: none;"></i>
                </div>
            </div>

            {{-- Preview Section --}}
            {{-- <div class="template-list" id="template-list">
                <!-- Les templates seront chargés ici dynamiquement -->
            </div> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Utilisation de modal-lg pour un modal large -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Preview Template</h5>
                            <span type="button" id="btn-close" class="bg-danger btn-close text-white"
                                data-bs-dismiss="modal" aria-label="Close"></span>
                        </div>
                        <div class="modal-body" style="margin: 0px !important; padding: 0px 10px 0px 10px">
                            <iframe id="template-preview-frame"
                                style="border: 0.5px solid; margin: 0px !important"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Preview Section --}}

            {{-- Preview Script --}}

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>

            {{-- End Preview Script --}}





            <div class="row row-cols-1 row-cols-md-3">


                @foreach ($templates as $template)
                    <div class="col mt-5" class="template-list" id="template-list{{ $template->id }}" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <div class="card template-card" data-template-id="{{ $template->id }}"
                            data-template-name="{{ $template->name }}" data-template-price="{{ $template->price }}">
                            <img class="" src="{{ asset('storage/' . $template->thumbnail) }}" width="100%"
                                alt="">
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
                                <div class="card-checkbox">
                                    <input type="checkbox" checked disabled>
                                </div>
                            </div>
                        </div>

                        {{-- <div  class="template-list" id="template-list{{ $template->id }}"></div> --}}
                        <div id="loading"></div>
                    </div>
                @endforeach
            </div>

            <div class="p-5 pb-0">
                <hr>
            </div>

            <div id="selected-template-info"
                class="text-center flex-column d-flex justify-content-center align-items-center mb-5">
                <p>Selected Template</p>
                <h3 id="selected-template-name">None</h3>
                <h5 id="selected-template-price">Price : FCFA 00</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="termsandconditions" required>
                    <label class="form-check-label" for="termsandconditions">
                        I accept <span style="color:#F05940">terms of use</span> & <span style="color:#F05940">Policy</span>
                    </label>
                </div>
                <form id="template-form" action="{{ route('saveTemplateSelection', ['service_id' => $service->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="template_id" id="selected-template-id">
                    <button type="submit" id="continue-button">Continue</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script pour gérer la prévisualisation des templates
            @foreach ($templates as $template)
                // Construire l'ID complet avec l'ID unique du template
                const templateList{{ $template->id }} = document.getElementById(
                    'template-list{{ $template->id }}');

                if (templateList{{ $template->id }}) {
                    // Associer un événement onclick à chaque template-list
                    templateList{{ $template->id }}.onclick = function() {
                        previewTemplate('{{ asset('storage/extracted/' . $template->id . '/index.html') }}');
                    };
                } else {
                    console.error('Élément avec l\'ID "template-list{{ $template->id }}" non trouvé.');
                }
            @endforeach

        });

        function previewTemplate(file) {
            const loading = document.getElementById('loading');
            const previewFrame = document.getElementById('template-preview-frame');
            loading.style.display = 'block';

            previewFrame.src = file;
            previewFrame.onload = () => {
                loading.style.display = 'none';
                // Optionnel : peut-être que vous voulez faire quelque chose après le chargement du fichier
            };
        }
    </script>
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

            // Variable pour garder une trace de la sélection du modèle
            let selectedTemplateId = null;

            templateCards.forEach(function(card) {
                card.addEventListener('click', function() {
                    templateCards.forEach(function(c) {
                        c.classList.remove('active', 'border-danger');
                    });
                    this.classList.add('active', 'border-danger');

                    selectedTemplateId = this.dataset.templateId;
                    const templateName = this.dataset.templateName;
                    const templatePrice = this.dataset.templatePrice === '' ? '00' : this.dataset
                        .templatePrice;

                    selectedTemplateName.textContent = templateName;
                    selectedTemplatePrice.textContent = `Price : FCFA ${templatePrice}`;
                    selectedTemplateIdInput.value = selectedTemplateId;
                });
            });

            continueButton.addEventListener('click', function(event) {
                if (selectedTemplateId === null) {
                    alert('Please select a template before continuing.');
                    event.preventDefault(); // Empêche la soumission du formulaire
                } else if (!acceptCheckbox.checked) {
                    alert('You must accept the terms and conditions before continuing.');
                    event.preventDefault(); // Empêche la soumission du formulaire
                }
            });


            function saveSelectedTemplate(templateId) {
                // Requête AJAX pour enregistrer le modèle sélectionné (optionnel)
                fetch('{{ route('saveTemplateSelection', ['service_id' => $service->id]) }}', {
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
