<div class="footer-wrapper justify-content-center align-items-end">
    <div class="footer-section f-section-1 text-center">
        <p class="text-white footer-text">
            &copy;
            {{ date('Y') }}
            {{ config('app.name') }}. All Rights Reserved
            <br>
            Designed & Developed by
            <a href="http://acetrot.com" target="_blank" class="text-white">
                Acetrot<img src="{{ url('backend/images/acetrot.png') }}" width="24" alt="">
            </a>
        </p>
    </div>
    <div class="footer-section f-section-2"></div>
</div>
<style>
    @media (max-width: 547px) {
        .footer-text {
            display: block;
            text-align: left;
            width: 100%;
        }

        .footer-text a {
            display: inline-flex;
            align-items: center;
        }
    }

    @media (min-width: 548px) {
        .footer-text br {
            display: none;
        }
    }
</style>
