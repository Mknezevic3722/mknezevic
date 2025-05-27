@extends("layouts.publick")

@section("title", "Kontakt")

@section("content")
<div style="max-width: 1200px; margin: 0 auto; padding: 40px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Kontakt</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 50px;">
        <!-- Kontakt podaci -->
        <div style="flex: 1; min-width: 350px;">
            <h2 style="margin-bottom: 25px; font-size: 24px;">Kontakt podaci</h2>
            <p style="font-size: 18px;"><strong>Adresa:</strong> Ulica jaja 123, Beograd</p>
            <p style="font-size: 18px;"><strong>Telefon:</strong> +381 60 123 456</p>
            <p style="font-size: 18px;"><strong>Email:</strong> kontakt@prodajajaja.rs</p>
            <p style="font-size: 18px;"><strong>Radno vreme:</strong><br>Pon - Pet: 08:00 - 18:00<br>Subota: 08:00 - 14:00</p>
        </div>

        <!-- Mapa -->
        <div style="flex: 2; min-width: 300px;">
            <h2 style="margin-bottom: 25px; font-size: 24px;">Lokacija</h2>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.914444424441!2d20.457273515529104!3d44.81450517909859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aaef6fa45c5%3A0x4eb1660f6b1d41d4!2sBeograd!5e0!3m2!1sen!2srs!4v1629462123456!5m2!1sen!2srs"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
