<section id="kriteria-section" class="section-padding section-padding-bottom bg-light-white kategori-form pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="tabs">
                    <div class="tab-content bg-custom-white bx-wrapper padding-20">
                        <div class="tab-pane fade active show">
                            <div class="tab-inner">
                                <h4 class="text-custom-black text-uppercase">Sesuaikan Mobil yang Kamu Cari</h4>
                                <form action="{{route('saw.frontend')}}" method="post" id="formSaw">
                                    @csrf
                                    <div class="row mb-md-80">
                                        <div class="col-12">
                                            @foreach ($kriteria as $krite)
                                                @php
                                                    $sub_kriteria = $krite->subKriteria->pluck('sub_kriteria', 'id')->toArray();
                                                    $sub_kriteria = [0 => 'Pilih '.$krite->kriteria] + $sub_kriteria;
                                                    // $with_default_opt = array_merge([0 => 'Pilih '.$krite->kriteria], $sub_kriteria);
                                                @endphp
                                                <div class="form-group group-form">
                                                    {!! Form::label('idKriteria'.$krite->id, $krite->kriteria, ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                    {!! Form::select('kriteria'.$krite->id, $sub_kriteria, null, ['class' => 'custom-select form-control-custom js-select-first-disabled select-sopir', 'id' => 'idKriteria'.$krite->id]) !!}
                                                    <div class="valid-feedback">Good</div>
                                                    @error('id_driver')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @else
                                                        <div class="invalid-feedback">Mohon pilih salah satu kriteria</div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            <hr class="mt-0">
                                            <button type="button" id="btnSaw" class="btn-first btn-submit">Cari Mobil berdasar kategori</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="recommendation-section" class="d-none section-padding section-padding-bottom bg-light-white kategori-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="tabs">
                    <div class="tab-content bg-custom-white bx-wrapper padding-20">
                        <div class="tab-pane fade active show">
                            <div class="tab-inner">
                                <h4 class="text-custom-black text-uppercase">Mobil Yang Cocok Untukmu</h4>
                                <div class=" col-12">
                                    <div class="car-grid">
                                        <div id="cardCar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scriptplus')
    <script>
        const btnSaw = document.getElementById('btnSaw')

        btnSaw.addEventListener('click', (event) => {
            event.preventDefault()
            const formSaw = document.getElementById('formSaw')
            const formData = new FormData(formSaw)
            const cardCar = document.getElementById('cardCar')
            const recomendationSection = document.getElementById('recommendation-section')
            cardCar.innerHTML = ''
            recomendationSection.classList.add('d-none')

            fetch(formSaw.getAttribute('action'), {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(response => {

                if(response.code == 1){
                    recomendationSection.classList.remove('d-none')
                    cardCar.insertAdjacentHTML('beforeend', response.card)
                    // recomendationSection.scrollIntoView({behavior: 'smooth'})
                    window.scrollTo({top: (document.getElementById('recommendation-section').getBoundingClientRect().top + window.pageYOffset) - document.getElementById('nav-wrapper').offsetHeight, behavior: 'smooth'})
                }

                if(response.code == 0){
                    showAlert(response.message, 'error')
                }

                if(response.code == undefined || response.code == null){
                    showAlert('Gagal mencari mobil yang sesuai', 'error')
                }
            })
            .catch(errror => {
                showAlert('Gagal mencari mobil yang sesuai', 'error')
                console.log(errror)
            })
        })

        function showAlert(message, type){
            Swal.fire({
                icon: type == 'error' ? 'error' : 'success',
                title: message,
                showConfirmButton: false,
                timer: 3000
            })
        }
    </script>
@endpush