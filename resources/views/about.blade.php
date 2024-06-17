@extends('layouts.app')

@section('content')
<style>
    .about-container {
        background-color: #f7f9fc;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .about-container h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .about-container p {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #555;
    }
    .team-member {
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #72edf2 10%, #5151e5 100%);
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        color: #fff;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .team-member:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .team-member i {
        font-size: 24px;
        margin-right: 15px;
    }
    .note {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        color: #333;
        margin-top: 20px;
    }
    .note p {
        margin: 5px 0;
    }
</style>
<div class="container">
    <div class="about-container">
        <h1>About Us</h1>
        <p>Develop by kelompok 1 anggota:</p>
        <ul>
            <li class="team-member">
                <i class="fas fa-user"></i>
                <p>Adityo Nugroho</p>
            </li>
            <li class="team-member">
                <i class="fas fa-user"></i>
                <p>Muhammad Muammar Sholihi</p>
            </li>
            <li class="team-member">
                <i class="fas fa-user"></i>
                <p>Aldino Titteo Rikardo</p>
            </li>
            <li class="team-member">
                <i class="fas fa-user"></i>
                <p>Putri Ayu Andini</p>
            </li>
            <li class="team-member">
                <i class="fas fa-user"></i>
                <p>Rahma Nabila</p>
            </li>
        </ul>
        <div class="note">
            <p>"Tidak ada yang bisa menebak kapan cinta itu datang dan pada siapa cinta itu berlabuh namun bila cinta telah menghampiri entah kenapa seakan tidak ada logika."</p>
        </div>
    </div>
</div>
@endsection
