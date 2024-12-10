@if(Session::has('error'))
<div class="aleart aleart-danger-solid transition duration-500 ease-out mt-2">
    {{ Session::get('error') }}
    <button class="close-button">
        <i class="ri-close-line text-inherit"></i>
    </button>
</div>
@endif

@if(Session::has('warning'))
<div class="aleart aleart-warning-solid transition duration-500 ease-out mt-2">
    {{ Session::get('warning') }}
    <button class="close-button">
        <i class="ri-close-line text-inherit"></i>
    </button>
</div>
@endif

@if(Session::has('success'))
<div class="aleart aleart-success-solid transition duration-500 ease-out mt-2">
    {{ Session::get('success') }}
    <button class="close-button">
        <i class="ri-close-line text-inherit"></i>
    </button>
</div>
@endif

@if(Session::has('info'))
<div class="aleart aleart-info-solid transition duration-500 ease-out mt-2">
    {{ Session::get('info') }}
    <button class="close-button">
        <i class="ri-close-line text-inherit"></i>
    </button>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select all close buttons in the alearts
        const closeButtons = document.querySelectorAll('.close-button');

        // Loop through each close button
        closeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const aleart = this.closest('.aleart');
                fadeOut(aleart);
            });
        });

        // Auto-hide alearts after a few seconds
        const alearts = document.querySelectorAll('.aleart');
        alearts.forEach(aleart => {
            setTimeout(() => fadeOut(aleart), 8000); // Auto-hide
        });

        // Function to apply fade-out effect and remove element
        function fadeOut(element) {
            element.style.transition = 'opacity 0.5s ease-out';
            element.style.opacity = '0';
            setTimeout(() => {
                element.style.display = 'none';
            }, 500); // Remove after fade-out
        }
    });
</script>
