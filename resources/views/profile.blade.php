@extends('layouts.app')
@section('page_title', 'Profile')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">{{ session('success') }}</span>
        </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="font-weight-semibold">{{ session('error') }}</span>
    </div>
    @endif

    <div class="row">

        <div class="col-md-4 d-flex ">

            <!-- User card -->
            <div class="card flex-fill">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{ Auth::user()->profile->getPhoto() }}" width="170"
                            height="170" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <form id="form_avatar" action="{{ route('profile.update', Auth::id()) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input id="upload" name="avatar" style="display: none" type="file"
                                    accept=".jpeg, .png, .jpg" />
                            </form>
                            <a href="#" id="upload_link"
                                class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                <i class="icon-pencil4"></i>
                            </a>
                        </div>
                    </div>

                    <h6 class="font-weight-semibold mb-0">{{ Auth::user()->name }}</h6>
                    <span class="d-block text-muted">{{ Auth::user()->usertype }}</span>

                    <div class="list-icons list-icons-extended mt-3">
                        <a href="#" class="list-icons-item" data-popup="tooltip" title="Change Password"
                            data-container="body" data-toggle="modal" data-target="#change_password"><i
                                class="icon-key"></i></a>


                        <!-- Change Password Modal -->
                        <div id="change_password" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Password</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <form action="{{ route('updatePassword', Auth::id()) }}" class="form-horizontal"
                                        method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Password Lama</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="password" name="old_password" id="password"
                                                            class="form-control" autocomplete="current-password" required>
                                                        <span class="input-group-append">
                                                            <button type="button" class="btn btn-link input-group-text"
                                                                onclick="show1()"><i id="password2"
                                                                    class="icon-eye2"></button></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Password Baru</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="password" name="new_password" id="katasandi_baru"
                                                            class="form-control" autocomplete="current-password" required>
                                                        <span class="input-group-append">
                                                            <button type="button" class="btn btn-link input-group-text"
                                                                onclick="show2()"><i id="katasandi_baru2"
                                                                    class="icon-eye2"></button></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3">Konfimasi Password</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="password" name="confirm_password"
                                                            id="confirm_katasandi" class="form-control"
                                                            autocomplete="current-password" required>
                                                        <span class="input-group-append">
                                                            <button type="button" class="btn btn-link input-group-text"
                                                                onclick="show3()"><i id="confirm_katasandi2"
                                                                    class="icon-eye2"></button></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-primary">Submit form</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /Change Password Modal -->


                    </div>
                </div>
            </div>
            <!-- /user card -->
        </div>

        <div class="col-md-8 d-flex">
            <!-- Input group addons -->
            <div class="card flex-fill">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Profil Saya</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    <form action="{{ route('profile.update', Auth::id()) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Username</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                    </span>
                                    <input type="text" name="name"
                                        class="form-control"value="{{ Auth::user()->name }}" @readonly(true)>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Alamat</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-home5"></i></span>
                                    </span>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $profile->profile->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar3"></i></span>
                                    </span>
                                    <input type="date" name="date_of_birth" class="form-control"
                                        value="{{ $profile->profile->date_of_birth }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Jenis Kelamin</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-users2"></i></span>
                                    </span>
                                    <input type="text" name="gender" class="form-control"
                                        value=" {{ $profile->profile->gender }}">


                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nomor Telepon</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-phone2"></i></span>
                                    </span>
                                    <input type="text" name="phone_number" class="form-control"
                                        value=" {{ $profile->profile->phone_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn bg-dark ml-3">Save <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /input group addons -->

        </div>
    </div>
    <script>
        function show1() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('#password2').addClass('icon-eye-blocked2');
            } else {
                x.type = "password";
                $('#password2').removeClass().addClass('icon-eye2');
            }
        }

        function show2() {
            var x = document.getElementById("katasandi_baru");
            if (x.type === "password") {
                x.type = "text";
                $('#katasandi_baru2').addClass('icon-eye-blocked2');
            } else {
                x.type = "password";
                $('#katasandi_baru2').removeClass().addClass('icon-eye2');
            }
        }

        function show3() {
            var x = document.getElementById("confirm_katasandi");
            if (x.type === "password") {
                x.type = "text";
                $('#confirm_katasandi2').addClass('icon-eye-blocked2');
            } else {
                x.type = "password";
                $('#confirm_katasandi2').removeClass().addClass('icon-eye2');
            }
        }

        // Default initialization
        $(document).ready(function() {
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });

            //input avatar
            $("#upload_link").on('click', function(e) {
                e.preventDefault();
                $("#upload:hidden").trigger('click');
            });
            $("#upload").on('change', function() {
                // console.log('work');
                $("#form_avatar").submit();
            })
        })
    </script>
@endsection
