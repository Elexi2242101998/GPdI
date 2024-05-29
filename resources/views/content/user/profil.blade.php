@extends('layout.main')
@section('judul','Profile')

@section('content')

<style>
        /* CSS untuk styling */
        .profile-container {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .profile-image {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .profile-details {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="{{asset('assets-fe/assets/theme/images/team/member-1.jpg')}}" alt="Foto Profil" class="profile-image">
        <div class="profile-details">
            <p>Nama: {{auth()->user()->name}}</p>
            <p>Email: {{auth()->user()->email}}</p>
            <p>No HP: {{auth()->user()->no_telepon}}</p>
        </div>
    </div>
</body>
@endsection
