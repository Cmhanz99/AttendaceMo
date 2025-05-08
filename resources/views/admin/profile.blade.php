@extends('layout.adminLayout')

@section('content')
<link rel="stylesheet" href="{{ asset('adminCss/profile.css') }}">
<div class="main-dashboard">
    <div class="profile-container">
        <div class="profile-info">
            <div class="profile-image">
                <img style="background-image: url('{{asset('profilePic/profile1.jpg')}}')">
            </div>
            <div class="profile-details">
                <form action="">
                    <div class="form-group">
                        <div class="form-g">
                            <label for="name">First Name</label>
                            <input type="text" id="name" name="first_name" value="{{ $client->first_name }}">
                        </div>
                        <div class="form-g">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $client->last_name }}">
                        </div>
                    </div>

                    <div class="form-class">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="hanz@gmail.com">
                    </div>

                    <div class="form-class">
                        <button type="submit">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="profile-stats">
            <div class="profile-account"></div>
            <div class="profile-handles"></div>
        </div>
    </div>
</div>
@endsection
