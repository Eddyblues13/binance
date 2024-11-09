<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Modal Sequence</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            text-align: center;
            position: relative;
        }

        .languages,
        .currencies {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .language,
        .currency {
            width: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .language img,
        .currency img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .language:hover,
        .currency:hover {
            transform: scale(1.1);
            transition: 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- First Modal -->
    <div id="firstModal" class="modal">
        <div class="modal-content">
            <h2>Welcome Modal</h2>
            <p>This is the introductory modal that will close automatically.</p>
            <button type="button" onclick="nextModal()">Proceed</button>
        </div>
    </div>

    <!-- Second Modal -->
    <div id="secondModal" class="modal">
        <div class="modal-content">
            <h2>Language Selection</h2>

            <form id="languageForm" method="POST">
                @csrf
                <div class="languages">
                    <label onclick="selectLanguage('Arabic')">
                        <input type="radio" name="country" value="Arabic" style="display: none;">
                        <img src="https://flagcdn.com/24x18/sa.png" alt="Arabic"> Arabic
                    </label><br>
                    <label onclick="selectLanguage('Bengali')">
                        <input type="radio" name="country" value="Bengali" style="display: none;">
                        <img src="https://flagcdn.com/24x18/bd.png" alt="Bengali"> Bengali
                    </label><br>
                    <label onclick="selectLanguage('Chinese')">
                        <input type="radio" name="country" value="Chinese" style="display: none;">
                        <img src="https://flagcdn.com/24x18/cn.png" alt="Chinese"> Chinese
                    </label><br>
                    <label onclick="selectLanguage('Czech')">
                        <input type="radio" name="country" value="Czech" style="display: none;">
                        <img src="https://flagcdn.com/24x18/cz.png" alt="Czech"> Czech
                    </label><br>
                    <label onclick="selectLanguage('German')">
                        <input type="radio" name="country" value="German" style="display: none;">
                        <img src="https://flagcdn.com/24x18/de.png" alt="German"> German
                    </label><br>
                    <label onclick="selectLanguage('English')">
                        <input type="radio" name="country" value="English" style="display: none;">
                        <img src="https://flagcdn.com/24x18/gb.png" alt="English"> English
                    </label><br>
                    <label onclick="selectLanguage('Spanish')">
                        <input type="radio" name="country" value="Spanish" style="display: none;">
                        <img src="https://flagcdn.com/24x18/es.png" alt="Spanish"> Spanish
                    </label><br>
                    <label onclick="selectLanguage('Estonian')">
                        <input type="radio" name="country" value="Estonian" style="display: none;">
                        <img src="https://flagcdn.com/24x18/ee.png" alt="Estonian"> Estonian
                    </label><br>
                    <label onclick="selectLanguage('French')">
                        <input type="radio" name="country" value="French" style="display: none;">
                        <img src="https://flagcdn.com/24x18/fr.png" alt="French"> French
                    </label><br>
                    <label onclick="selectLanguage('Hindi')">
                        <input type="radio" name="country" value="Hindi" style="display: none;">
                        <img src="https://flagcdn.com/24x18/in.png" alt="Hindi"> Hindi
                    </label><br>
                    <label onclick="selectLanguage('Croatian')">
                        <input type="radio" name="country" value="Croatian" style="display: none;">
                        <img src="https://flagcdn.com/24x18/hr.png" alt="Croatian"> Croatian
                    </label><br>
                    <label onclick="selectLanguage('Armenian')">
                        <input type="radio" name="country" value="Armenian" style="display: none;">
                        <img src="https://flagcdn.com/24x18/am.png" alt="Armenian"> Armenian
                    </label><br>
                </div>

            </form>
        </div>
    </div>

    <!-- Third Modal -->
    <div id="currencyModal" class="modal">
        <div class="modal-content">
            <h2>Currency Selection</h2>

            <form id="currencyForm" method="POST">
                @csrf
                <div class="currencies">
                    <label onclick="selectCurrency('USD')">
                        <input type="radio" name="currency" value="USD" style="display: none;">
                        <img src="currency-icons/usd.png" alt="USD"> USD
                    </label><br>
                    <label onclick="selectCurrency('EUR')">
                        <input type="radio" name="currency" value="EUR" style="display: none;">
                        <img src="currency-icons/eur.png" alt="EUR"> EUR
                    </label><br>
                    <label onclick="selectCurrency('GBP')">
                        <input type="radio" name="currency" value="GBP" style="display: none;">
                        <img src="currency-icons/gbp.png" alt="GBP"> GBP
                    </label><br>
                    <!-- Add more currencies here -->

                    <label onclick="selectCurrency('JPY')">
                        <input type="radio" name="currency" value="JPY" style="display: none;">
                        <img src="currency-icons/jpy.png" alt="JPY"> JPY
                    </label><br>
                    <label onclick="selectCurrency('AUD')">
                        <input type="radio" name="currency" value="AUD" style="display: none;">
                        <img src="currency-icons/aud.png" alt="AUD"> AUD
                    </label><br>
                    <label onclick="selectCurrency('CAD')">
                        <input type="radio" name="currency" value="CAD" style="display: none;">
                        <img src="currency-icons/cad.png" alt="CAD"> CAD
                    </label><br>
                    <!-- Additional currencies can be listed in the same way -->
                </div>
            </form>
        </div>
    </div>

    <!-- Fourth Modal -->
    <div id="fourthModal" class="modal">
        <div class="modal-content">
            <h2>Final Welcome Modal</h2>
            <p>This is the final welcome message modal, which will close automatically.</p>
            <button type="button" onclick="closeAllModals()">Finish</button>
        </div>
    </div>

    <script>
        function selectLanguage(language) {
            fetch('{{ route('save.language') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ country: language })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('secondModal').style.display = 'none';
                    nextModal();
                } else {
                    alert('Error saving language selection');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function selectCurrency(currency) {
            fetch('{{ route('save.currency') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ currency: currency })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('currencyModal').style.display = 'none';
                    nextModal();
                } else {
                    alert('Error saving currency selection');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function showModal(id) {
            document.querySelectorAll('.modal').forEach(modal => modal.style.display = "none");
            document.getElementById(id).style.display = "block";
        }

        function nextModal() {
            const currentModal = document.querySelector('.modal[style*="block"]');
            if (currentModal) {
                currentModal.style.display = "none";
                const nextModal = currentModal.nextElementSibling;
                if (nextModal && nextModal.classList.contains("modal")) nextModal.style.display = "block";
            }
        }

        function closeAllModals() {
            document.querySelectorAll('.modal').forEach(modal => modal.style.display = "none");
        }

        document.addEventListener("DOMContentLoaded", function() {
            showModal("firstModal");
            setTimeout(() => {
                nextModal();
                setTimeout(() => showModal("fourthModal"), 30000);
            }, 5000);
        });
    </script>
</body>

</html>