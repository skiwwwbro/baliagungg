<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/css/intlTelInput.css">

<style>
    .iti { width: 100%; }

    .iti input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid rgba(0,0,0,.1);
        background: #F8F3EC;
        padding: 1rem 1.25rem;
        font-size: .875rem;
        color: #1A1A1A;
        outline: none;
    }

    .iti input:focus {
        border-color: #B07A45;
    }
</style>

{{-- BOOKING MODAL --}}
<div id="bookingModal" class="fixed inset-0 z-[999] hidden bg-black/70">

    <div class="flex min-h-full items-end justify-center sm:items-center sm:p-4">

        <div class="relative max-h-[88vh] w-full overflow-y-auto rounded-t-[34px] bg-white p-5 shadow-2xl sm:max-w-[680px] sm:rounded-[34px] sm:p-6">

            <button onclick="closeBookingModal()"
                class="absolute right-5 top-5 flex h-10 w-10 items-center justify-center rounded-full bg-[#F5F1EB] text-xl text-[#1A1A1A]">
                ×
            </button>

            <div class="mx-auto mb-5 h-1.5 w-14 rounded-full bg-black/15 sm:hidden"></div>

            <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                Car Booking
            </p>

            <h2 class="font-serif text-[34px] leading-[0.95] text-[#1A1A1A] sm:text-[38px]">
                Book Your Car
            </h2>

            <form id="carModalBookingForm" method="POST" action="{{ route('cars.booking.store') }}" class="mt-6">
                @csrf

                <input type="hidden" name="car_id" id="modal_car_id">
                <input type="hidden" name="car_name" id="modal_car_name">
                <input type="hidden" name="car_category" id="modal_car_category">
                <input type="hidden" name="price" id="modal_price">
                <input type="hidden" name="customer_phone" id="customer_phone_hidden">

                <div class="mb-5 rounded-2xl bg-[#F5F1EB] p-4">
                    <p class="text-sm text-[#8C7B62]">Selected Car</p>
                    <h3 id="modal_car_title" class="mt-1 text-xl font-semibold text-[#1A1A1A]"></h3>
                    <p id="modal_car_price" class="mt-2 text-sm text-[#6B6B6B]"></p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <input name="customer_name" required placeholder="Full name"
                        class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                    <input id="phone" type="tel" required placeholder="812 xxxx xxxx">
                </div>

                <input name="customer_email" type="email" placeholder="Email address"
                    class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <input name="pickup_date" type="date" required
                        class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                    <input name="return_date" type="date" required
                        class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">
                </div>

                <input name="pickup_location" required placeholder="Hotel, villa, airport, or address"
                    class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                <textarea name="note" rows="3" placeholder="Additional note..."
                    class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none"></textarea>

                <button type="submit"
                    class="mt-6 w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white hover:bg-[#B07A45]">
                    Continue To Payment
                </button>
            </form>

        </div>

    </div>

</div>

{{-- SUCCESS MODAL --}}
<div id="bookingSuccessModal" class="fixed inset-0 z-[1000] hidden items-center justify-center bg-black/70 p-4">

    <div class="w-full max-w-[520px] rounded-[34px] bg-white p-8 text-center shadow-2xl">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100 text-4xl font-bold text-green-700">
            ✓
        </div>

        <p class="mt-6 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
            Booking Successful
        </p>

        <h2 class="mt-3 font-serif text-[38px] leading-[0.95] text-[#1A1A1A]">
            Thank You
        </h2>

        <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
            Your booking has been submitted successfully. You can check your booking status from your account.
        </p>

        <div class="mt-6 rounded-2xl bg-[#F5F1EB] p-5">
            <p class="text-sm text-[#8C7B62]">Booking Code</p>

            <p id="success_booking_code" class="mt-1 text-xl font-semibold text-[#1A1A1A]">
                -
            </p>
        </div>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">

            <a href="{{ route('customer.bookings') }}"
               class="flex-1 rounded-full bg-[#1A1A1A] px-6 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white">
                My Bookings
            </a>

            <button onclick="closeSuccessModal()"
                class="flex-1 rounded-full border border-black/10 px-6 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-[#1A1A1A]">
                Continue
            </button>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/utils.js"></script>

<script>
let carPhoneInputInstance = null;

document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.querySelector('#phone');

    if (phoneInput && window.intlTelInput) {
        carPhoneInputInstance = window.intlTelInput(phoneInput, {
            initialCountry: 'id',
            separateDialCode: true,
            preferredCountries: ['id', 'au', 'sg', 'my', 'us', 'gb'],
            nationalMode: false,
            utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/utils.js'
        });
    }

    const form = document.querySelector('#carModalBookingForm');
    const hiddenPhone = document.querySelector('#customer_phone_hidden');

    if (form && hiddenPhone && phoneInput) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const number = carPhoneInputInstance ? carPhoneInputInstance.getNumber() : phoneInput.value;

            hiddenPhone.value = number && number.length > 3
                ? number
                : phoneInput.value;

            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (!response.ok) {
                let message = data.message ?? 'Booking gagal. Silakan cek kembali data booking.';

                if (data.errors) {
                    message = Object.values(data.errors).flat().join('\n');
                }

                alert(message);
                return;
            }

            if (!data.snap_token) {
                alert('Snap token tidak tersedia.');
                return;
            }

            closeBookingModal();

            snap.pay(data.snap_token, {
                onSuccess: function () {
                    showSuccessModal(data.booking_code);
                },
                onPending: function () {
                    showSuccessModal(data.booking_code);
                },
                onError: function () {
                    alert('Payment failed.');
                },
                onClose: function () {
                    showSuccessModal(data.booking_code);
                }
            });
        });
    }
});

function openBookingModal(id, name, category, price) {
    document.getElementById('modal_car_id').value = id;
    document.getElementById('modal_car_name').value = name;
    document.getElementById('modal_car_category').value = category;
    document.getElementById('modal_price').value = price;

    document.getElementById('modal_car_title').innerText = name;
    document.getElementById('modal_car_price').innerText = 'From $' + price + ' / Day';

    const modal = document.getElementById('bookingModal');
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeBookingModal() {
    const modal = document.getElementById('bookingModal');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

function showSuccessModal(bookingCode) {
    document.getElementById('success_booking_code').innerText = bookingCode ?? '-';

    const modal = document.getElementById('bookingSuccessModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.classList.add('overflow-hidden');
}

function closeSuccessModal() {
    const modal = document.getElementById('bookingSuccessModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');
}
</script>