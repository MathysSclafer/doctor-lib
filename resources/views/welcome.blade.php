@extends('layouts.app')


@section('content')
    <div class="flex px-8 items-center justify-evenly">
        <div>
            <h1 class="!font-black whitespace-nowrap !text-5xl text-black relative">Prenez rendez-vous, <br>
                soignez-vous
                <span class="after:absolute after:w-3/5 after:h-5 after:bg-blue-300 after:right-5 after:bottom-0 after:-z-20">simplement</span>
                !</h1>
            <p class="max-w-lg text-sm my-4 text-black/50">Facilitez vos rendez-vous médicaux avec notre plateforme intuitive. Trouvez un professionnel de santé près de chez vous, consultez ses disponibilités et prenez rendez-vous en quelques clics. Simplifiez votre parcours de soin et gagnez du temps dès aujourd’hui !</p>
            <div class="flex">
                <button class="!rounded-lg bg-blue-500 px-4 py-2 transition duration-300 text-white/90 hover:bg-blue-700 hover:text-white">Prendre rendez-vous</button>
            </div>
        </div>
        <div >
            <img src="../../doctorImg.png" alt="" class="h-80">
        </div>
    </div>
    <div class="flex flex-col px-7 items-center justify-center my-24">
        <h2 class="font-quicksand !text-4xl !font-bold !mb-12">Les services que nous proposons</h2>
        <div class="flex flex-wrap justify-evenly w-full gap-y-5">
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-calendar-check fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Prise de rendez-vous en ligne</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Prenez facilement un rendez-vous avec un professionnel de santé en quelques clics, à tout moment, où que vous soyez.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-calendar-day fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Consultation des disponibilités</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Consultez les créneaux horaires disponibles en temps réel et choisissez celui qui vous convient le mieux.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-bell fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Rappels de rendez-vous</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Recevez des rappels automatiques pour ne jamais oublier un rendez-vous et gérer votre emploi du temps en toute sérénité.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-cogs fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Gestion de vos rendez-vous</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Accédez à votre historique de rendez-vous, modifiez ou annulez en toute simplicité directement depuis votre compte.
                </p>
            </div>
        </div>
    </div>

    <div class="flex px-7 items-center justify-evenly my-24">
        <h2 class="font-quicksand !text-4xl !font-bold !mb-12">Nos spécialités</h2>
        <div class="grid gap-5 grid-cols-2">
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-user-md fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Médecine générale</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Pour les consultations de santé de base, les bilans de santé et les soins préventifs.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-stethoscope fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Médecine spécialisée</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Inclut des spécialistes comme les cardiologues, dermatologues, neurologues, etc.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-cut fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Chirurgie et soins spécialisés</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Pour les chirurgiens et les soins médicaux nécessitant des interventions spécialisées.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-white shadow-sm py-4 rounded-xl w-80 !ring ring-transparent transition duration-300 hover:ring-black/20">
                <i class="fa-solid fa-heartbeat fa-2xl !text-5xl"></i>
                <h4 class="my-3 font-quicksand !text-lg !font-bold">Soins de bien-être et rééducation</h4>
                <p class="max-w-60 !text-sm text-black/50 mb-0 text-center">
                    Inclut les kinésithérapeutes, ostéopathes, acupuncteurs et autres professionnels axés sur le bien-être physique.
                </p>
            </div>
        </div>
    </div>


    <div class="flex flex-col items-center justify-center my-12">
        <h3 class="font-quicksand !text-4xl !font-bold !mb-12">Trouvez un rendez-vous</h3>
        <a href="{{route('schedule')}}" class="!rounded-lg !bg-blue-500 px-4 py-2 transition duration-300 !text-white/90 text-decoration-none hover:!bg-blue-700 hover:!text-white">Voir le planning</a>
    </div>

    <div>
        <form action="{{route('appointment.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                <div class="col-md-6">
                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>

                    @error('date')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('Temps') }}</label>

                <div class="col-md-6">
                    <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" required>

                    @error('time')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="doctor_id" class="col-md-4 col-form-label text-md-end">{{ __('Id du docteur') }}</label>

                <div class="col-md-6">
                    <input id="doctor_id" type="text" class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" required>

                    @error('doctor_id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" required>

                    @error('type')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
