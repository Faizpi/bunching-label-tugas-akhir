@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-light py-5">
            @if($setting)
                @if($setting->logo)
                    <img src="{{$setting->logo}}" alt="Logo" width="150px" class="d-block mx-auto mb-3">
                @else
                    <h2 class="text-secondary text-center">Logo Aplikasi</h2>
                @endif
            @endif
            <h3 class="text-center">{{ $setting ? $setting->jargon : config('app.name')}}</h3>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if($registered)
                                @if($vote_time)
                                    @if($already)
                                        @if($already_other)
                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGURUS</h5>
                                            <div class="row mt-3">
                                                @foreach($candidates as $i => $candidate)
                                                    <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                        <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                        <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                        <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                        <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                        <div class="form-check ps-0 text-center">
                                                            <input class="form-check-input float-none d-block mx-auto my-2" type="radio" value="{{$candidate->id}}" name="candidate" id="candidate-{{$candidate->id}}" disabled {{$candidate->id == $vote_id ? 'checked':''}}>
                                                            <label class="form-check-label font-weight-bold" for="candidate-{{$candidate->id}}">
                                                                Pilih {{$candidate->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                            <hr>

                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGAWAS</h5>
                                            <div class="row mt-3">
                                                @foreach($candidate_others as $i => $candidate)
                                                    <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                        <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                        <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                        <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                        <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                        <div class="form-check ps-0 text-center">
                                                            <input class="form-check-input float-none d-block mx-auto my-2" type="radio" value="{{$candidate->id}}" name="candidate-other" id="candidate-other-{{$candidate->id}}" disabled {{$candidate->id == $vote_id_other ? 'checked':''}}>
                                                            <label class="form-check-label font-weight-bold" for="candidate-{{$candidate->id}}">
                                                                Pilih {{$candidate->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="col-12 col-md-6 offset-md-3 mt-5">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-warning" disabled>Terima Kasih Telah Memberikan Suara Anda</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGAWAS</h5>
                                            <form method="POST" action="{{route('web.vote')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="type" value="{{\App\Constans\CandidateType::PENGAWAS}}">
                                                <div class="row mt-3">
                                                    @foreach($candidate_others as $i => $candidate)
                                                        <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                            <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                            <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                            <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                            <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                            <div class="form-check ps-0 text-center">
                                                                <input class="form-check-input float-none d-block mx-auto my-2" type="radio" value="{{$candidate->id}}" name="candidate" id="candidate-{{$candidate->id}}" required>
                                                                <label class="form-check-label font-weight-bold" for="candidate-{{$candidate->id}}">
                                                                    Pilih {{$candidate->name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-12 col-md-6 offset-md-3 mt-5">
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary">Kirim Pilihan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    @else
                                        @if($user_aktif)
                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGURUS</h5>
                                            <form method="POST" action="{{route('web.vote')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="type" value="{{\App\Constans\CandidateType::KETUA}}">
                                                <div class="row mt-3">
                                                    @foreach($candidates as $i => $candidate)
                                                        <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                            <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                            <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                            <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                            <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                            <div class="form-check ps-0 text-center">
                                                                <input class="form-check-input float-none d-block mx-auto my-2" type="radio" value="{{$candidate->id}}" name="candidate" id="candidate-{{$candidate->id}}" required>
                                                                <label class="form-check-label font-weight-bold" for="candidate-{{$candidate->id}}">
                                                                    Pilih {{$candidate->name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-12 col-md-6 offset-md-3 mt-5">
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary">Kirim Pilihan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGURUS</h5>
                                            <div class="row mt-3">
                                                @foreach($candidates as $i => $candidate)
                                                    <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                        <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                        <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                        <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                        <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                    </div>
                                                @endforeach

                                            </div>

                                            <hr>

                                            <h5 class="card-title text-center">KANDIDAT KETUA PENGAWAS</h5>
                                            <div class="row mt-3">
                                                @foreach($candidate_others as $i => $candidate)
                                                    <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                        <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                        <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                        <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                        <p class="text-center mt-3">{{$candidate->motto}}</p>
                                                    </div>
                                                @endforeach

                                                <div class="col-12 col-md-6 offset-md-3 mt-5">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-warning" disabled>TERIMAKSIH TELAH MENGKONFIRMASI KEHADIRAN ANGGOTA</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <h5 class="card-title text-center">Hi, {{\Auth::user()->name}}</h5>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-6 offset-md-3 mt-5">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-warning" disabled>Anda telah melakukan registrasi</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if($vote_time && !$confirm_time)
                                    <h5 class="card-title text-center">KANDIDAT KETUA PENGURUS</h5>
                                    <div class="row mt-3">
                                        @foreach($candidates as $i => $candidate)
                                            <div class="col-12 col-md-5 border p-3 mb-1 {{ ($i+1)%2 ? 'offset-md-1':'ms-1' }}">
                                                <h3 class="text-dark text-center font-weight-bold">{{$candidate->name}}</h3>
                                                <h6 class="text-dark text-center font-weight-bold">{{$candidate->division}}</h6>
                                                <img class="d-block mx-auto mt-3 p-1 border" src="{{$candidate->photo}}" alt="{{$candidate->name}}">
                                                <p class="text-center mt-3">{{$candidate->motto}}</p>
                                            </div>
                                        @endforeach

                                        <div class="col-12 col-md-6 offset-md-3 mt-5">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-warning" disabled>Anda Tidak Terdaftar</button>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($confirm_time)
                                    <h5 class="card-title text-center">Hi, {{\Auth::user()->name}}</h5>
                                    <h2 class="text-center">Silahkan klik tombol "KONFIRMASI KEHADIRAN" untuk mendaftarkan diri sebagai peserta.</h2>
                                    <div class="col-12 col-md-6 offset-md-3 mt-5">
                                            <div class="d-grid gap-2">
                                                <a href="{{route('web.confirm')}}" class="btn btn-warning">KONFIRMASI KEHADIRAN</a>
                                            </div>
                                        </div>
                                @else
                                    <h5 class="card-title text-center">Hi, {{\Auth::user()->name}}</h5>
                                    <h2 class="text-center">Semua masih dalam persiapan, tunggu hingga waktu konfirmasi telah dibuka oleh panitia.</h2>
                                    <!-- <div class="col-12 col-md-6 offset-md-3 mt-5">
                                            <div class="d-grid gap-2">
                                                <a href="{{route('web.confirm')}}" class="btn btn-warning">KONFIRMASI KEHADIRAN</a>
                                            </div>
                                        </div> -->
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection