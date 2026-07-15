<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/css/intlTelInput.css">

<style>
.iti{width:100%;}
.iti input{width:100%;border-radius:1rem;border:1px solid rgba(0,0,0,.1);background:#F8F3EC;padding:1rem 1.25rem;font-size:.875rem;color:#1A1A1A;outline:none;}
.iti input:focus{border-color:#B07A45;}
</style>

<div id="motorcycleBookingModal" class="fixed inset-0 z-[999] hidden bg-black/70">
    <div class="flex min-h-full items-end justify-center sm:items-center sm:p-4">
        <div class="relative max-h-[88vh] w-full overflow-y-auto rounded-t-[34px] bg-white p-5 shadow-2xl sm:max-w-[680px] sm:rounded-[34px] sm:p-6">

            <button onclick="closeMotorcycleBookingModal()" class="absolute right-5 top-5 flex h-10 w-10 items-center justify-center rounded-full bg-[#F5F1EB] text-xl">×</button>
            <div class="mx-auto mb-5 h-1.5 w-14 rounded-full bg-black/15 sm:hidden"></div>

            <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">Motorcycle Booking</p>
            <h2 class="font-serif text-[34px] leading-[0.95] text-[#1A1A1A]">Rent Your Ride</h2>

            <form id="motorcycleBookingForm" method="POST" action="{{ route('motorcycles.booking.store') }}" class="mt-6">
                @csrf

                <input type="hidden" name="motorcycle_id" id="modal_motorcycle_id">
                <input type="hidden" name="customer_phone" id="motorcycle_phone_hidden">

                <div class="mb-5 rounded-2xl bg-[#F5F1EB] p-4">
                    <p class="text-sm text-[#8C7B62]">Selected Motorcycle</p>
                    <h3 id="modal_motorcycle_title" class="mt-1 text-xl font-semibold text-[#1A1A1A]"></h3>
                    <p id="modal_motorcycle_price" class="mt-2 text-sm text-[#6B6B6B]"></p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <input name="customer_name" required placeholder="Full Name" class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">
                    <input id="motorcycle_phone" type="tel" required placeholder="812 xxxx xxxx">
                </div>

                <input name="customer_email" type="email" placeholder="Email Address" class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <input name="pickup_date" type="date" required class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">
                    <input name="return_date" type="date" required class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">
                </div>

                <input name="pickup_location" required placeholder="Pickup Location" class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

                <textarea name="note" rows="3" placeholder="Additional Note" class="mt-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none"></textarea>

                <button type="submit" class="mt-6 w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white hover:bg-[#B07A45]">
                    Continue To Payment
                </button>
            </form>
        </div>
    </div>
</div>

<div id="motorcycleSuccessModal" class="fixed inset-0 z-[1000] hidden items-center justify-center bg-black/70 p-4">
    <div class="w-full max-w-[520px] rounded-[34px] bg-white p-8 text-center shadow-2xl">
        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100 text-4xl font-bold text-green-700">✓</div>

        <p class="mt-6 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">Booking Successful</p>
        <h2 class="mt-3 font-serif text-[38px] leading-[0.95] text-[#1A1A1A]">Thank You</h2>

        <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
            Your motorcycle booking has been submitted successfully.
        </p>

        <div class="mt-6 rounded-2xl bg-[#F5F1EB] p-5">
            <p class="text-sm text-[#8C7B62]">Booking Code</p>
            <p id="motorcycle_success_booking_code" class="mt-1 text-xl font-semibold text-[#1A1A1A]">-</p>
        </div>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('customer.bookings') }}" class="flex-1 rounded-full bg-[#1A1A1A] px-6 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white">My Bookings</a>
            <button onclick="closeMotorcycleSuccessModal()" class="flex-1 rounded-full border border-black/10 px-6 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-[#1A1A1A]">Continue</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/intlTelInput.min.js"></script>

<script>
let motorcyclePhoneInstance = null;

document.addEventListener('DOMContentLoaded', function() {
    motorcyclePhoneInstance = window.intlTelInput(document.querySelector('#motorcycle_phone'), {
        initialCountry: 'id',
        separateDialCode: true,
        preferredCountries: ['id','au','sg','my','us','gb']
    });

    document.getElementById('motorcycleBookingForm').addEventListener('submit', async function(e){
        e.preventDefault();

        const submitButton = this.querySelector('button[type="submit"]');

    submitButton.disabled = true;
    submitButton.innerHTML = `
        <svg class="animate-spin h-4 w-4 inline mr-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24">

            <circle class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"></circle>

            <path class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
            </path>

        </svg>

        Processing...
    `;

        const phoneInput = document.querySelector('#motorcycle_phone');
        const hiddenPhone = document.getElementById('motorcycle_phone_hidden');
        const number = motorcyclePhoneInstance ? motorcyclePhoneInstance.getNumber() : phoneInput.value;

        hiddenPhone.value = number && number.length > 3 ? number : phoneInput.value;

        const response = await fetch(this.action,{
            method:'POST',
            body:new FormData(this),
            headers:{
                'Accept':'application/json',
                'X-CSRF-TOKEN': this.querySelector('input[name="_token"]').value
            }
        });

        const data = await response.json();

        if (!response.ok) {
            let message = data.message ?? 'Booking gagal.';
            if (data.errors) message = Object.values(data.errors).flat().join('\n');
            alert(message);
            return;
        }

        if(data.snap_token){
            closeMotorcycleBookingModal();

            snap.pay(data.snap_token,{

                onSuccess:function(){

                    document.getElementById('motorcycleBookingForm').reset();

                    showMotorcycleSuccessModal(data.booking_code);

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Continue To Payment';
                },

                onPending:function(){

                    document.getElementById('motorcycleBookingForm').reset();

                    showMotorcycleSuccessModal(data.booking_code);

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Continue To Payment';
                },

                onError:function(){

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Continue To Payment';

                    alert('Payment failed.');
                },

                onClose:function(){

                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Continue To Payment';
                }

            });
        }
    });
});

function openMotorcycleBookingModal(id,name,category,price){
    document.getElementById('modal_motorcycle_id').value=id;
    document.getElementById('modal_motorcycle_title').innerText=name;
    document.getElementById('modal_motorcycle_price').innerText='From $'+price+' / Day';
    document.getElementById('motorcycleBookingModal').classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeMotorcycleBookingModal(){
    document.getElementById('motorcycleBookingModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

function showMotorcycleSuccessModal(code){
    document.getElementById('motorcycle_success_booking_code').innerText = code ?? '-';
    const modal = document.getElementById('motorcycleSuccessModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeMotorcycleSuccessModal(){
    const modal = document.getElementById('motorcycleSuccessModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}
</script>