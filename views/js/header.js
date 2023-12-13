document.body.insertAdjacentHTML('afterbegin', 'header');

    // Event listener to toggle the dropdown menu
    const accountsLink = document.querySelector('#acc-management-nav');
    accountsLink.addEventListener('click', function (event) {
        const dropdown = document.getElementById('account-dropdown');
        dropdown.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside the menu
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('account-dropdown');
        if (!accountsLink.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });