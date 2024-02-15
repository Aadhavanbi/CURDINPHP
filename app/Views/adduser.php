<!-- adduser.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <h2>Add New User</h2>
    <form action="<?php echo base_url('addUsers'); ?>" method="post" enctype="multipart/form-data">
        <label for="username"><h5>Username:</h5></label>
        <input type="text" id="userName" name="userName"><br>

        <label for="age"><h5>Age:</h5></label>
        <input type="text" id="age" name="age"><br>

        <label for="image"><h5>Photo:</h5></label>
        <input type="file" id="image" name="image"><br>

        <label for="country"><h5>Country:</h5></label>
        <select id="country" name="country">
            <option value="">Select Country</option>
            <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="state"><h5>State:</h5></label>
        <select id="state" name="state">
            <option value="">Select State</option>
        </select><br>

        <label for="city"><h5>City:</h5></label>
        <select id="city" name="city">
            <option value="">Select City</option>
        </select><br>

        <input type="submit" value="Add User">
    </form>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var countryDropdown = document.getElementById('country');
            var stateDropdown = document.getElementById('state');
            var cityDropdown = document.getElementById('city');

            countryDropdown.addEventListener('change', function() {
                var countryId = this.value;
                stateDropdown.innerHTML = '<option value="">Select State</option>'; // Reset states dropdown
                cityDropdown.innerHTML = '<option value="">Select City</option>'; // Reset cities dropdown
                if (countryId !== '') {
                    fetchStates(countryId);
                }
            });

            stateDropdown.addEventListener('change', function() {
                var stateId = this.value;
                cityDropdown.innerHTML = '<option value="">Select City</option>'; // Reset cities dropdown
                if (stateId !== '') {
                    fetchCities(stateId);
                }
            });

            function fetchStates(countryId) {
                fetch('<?php echo base_url('fetchStates/'); ?>' + countryId)
                    .then(response => response.json())
                    .then(states => {
                        states.forEach(state => {
                            stateDropdown.innerHTML += '<option value="' + state.id + '">' + state.name + '</option>';
                        });
                        M.FormSelect.init(stateDropdown);
                    })
                    .catch(error => console.error('Error fetching states:', error));
            }

            function fetchCities(stateId) {
                fetch('<?php echo base_url('fetchCities/'); ?>' + stateId)
                    .then(response => response.json())
                    .then(cities => {
                        cities.forEach(city => {
                            cityDropdown.innerHTML += '<option value="' + city.id + '">' + city.name + '</option>';
                        });
                        M.FormSelect.init(cityDropdown);
                    })
                    .catch(error => console.error('Error fetching cities:', error));
            }

            // Initialize Materialize select dropdowns
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
