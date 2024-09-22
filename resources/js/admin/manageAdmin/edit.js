//Author: Lim Yu Her 
document.addEventListener('DOMContentLoaded', function() {
    const roleCheckboxes = document.querySelectorAll('.role-checkbox');
    const roleTextInput = document.getElementById('roles-display');

    // Call the function to initialize on page load
    updateRolesTextField();

    // Update input field based on checkboxes
    function updateRolesTextField() {
        let roles = roleTextInput.value.split(',').map(s => s.trim()).filter(Boolean);

        roleCheckboxes.forEach(checkbox => {
            if (checkbox.checked && !roles.includes(checkbox.value)) {
                roles.push(checkbox.value);
            } else if (!checkbox.checked) {
                roles = roles.filter(role => role !== checkbox.value);
            }
        });

        roleTextInput.value = roles.join(', ');
    }

    // Event listener for checkboxes
    roleCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateRolesTextField);
    });
});