document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('user-movil-button');
    const menu = document.getElementById('mobile-menu');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
        const isExpanded = menu.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', isExpanded);
    });

    // Optional: hide the menu when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-menu');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
        const isExpanded = menu.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', isExpanded);
    });

    // Optional: hide the menu when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('dropdownSearchButton');
    const menu = document.getElementById('dropdownSearch');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        menu.classList.toggle('hidden');

        // Optional: update aria-expanded attribute
        const isExpanded = menu.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', isExpanded);
    });

    // Optional: hide the menu when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!menu.contains(event.target) && event.target !== button) {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        setTimeout(function () {
            successMessage.classList.add('hidden');
        }, 5000);
    }
});