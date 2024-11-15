{{-- @include('user.layouts.header') --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
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
    }

    .currency,
    .country {
        display: inline-block;
        text-align: center;
        margin: 15px;
        cursor: pointer;
    }

    .currency img,
    .country img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        transition: transform 0.3s ease;
    }

    .currency img:hover,
    .country img:hover {
        transform: scale(1.1);
    }

    /* Hide the radio buttons */
    .currency input[type="radio"],
    .country input[type="radio"] {
        display: none;
    }

    #countryForm {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
        /* Adjust number of columns */
        gap: 15px;
        /* Space between items */
    }

    .country label {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 14px;
    }

    .country img {
        width: 40px;
        /* Adjust size of images */
        height: auto;
    }

    .country span {
        margin-top: 5px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- First Modal -->
  <!-- Modal Structure -->
<div id="firstModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Welcome to Plus500</h2>
        <p>Please complete your account setup to get started.</p>
        <button onclick="continueSetup()">Continue</button>
    </div>
</div>

<!-- Styles -->
<style>
  /* Modal Background */
  .modal {
      display: block; /* Change to 'none' to hide initially */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
  }

  /* Modal Content */
  .modal-content {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.5s;
  }

  /* Close Button */
  .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      color: #333;
      cursor: pointer;
  }

  /* Modal Heading */
  .modal-content h2 {
      color: #1d3557;
      margin-bottom: 10px;
  }

  /* Modal Text */
  .modal-content p {
      color: #555;
      margin-bottom: 20px;
  }

  /* Continue Button */
  .modal-content button {
      background-color: #1d3557;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
  }

  .modal-content button:hover {
      background-color: #457b9d;
  }

  /* Fade In Animation */
  @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
  }
</style>

<!-- JavaScript for Modal -->
<script>
  function closeModal() {
      document.getElementById("firstModal").style.display = "none";
  }

  function continueSetup() {
      closeModal();
      // Add any additional setup actions here
  }
</script>


    <!-- Country Selection Modal -->
    <div id="countryModal" class="modal">
        <div class="modal-content">
            <h2>Select a Country</h2>
            <form id="countryForm" method="POST" action="{{ route('saveCountry') }}">
                @csrf
                <div class="country">
                    <input type="radio" id="countryUSA" name="country" value="USA">
                    <label for="countryUSA">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg"
                            alt="USA Flag">
                        <span>United States</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUK" name="country" value="UK">
                    <label for="countryUK">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg"
                            alt="UK Flag">
                        <span>United Kingdom</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCanada" name="country" value="Canada">
                    <label for="countryCanada">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Flag_of_Canada.svg"
                            alt="Canada Flag">
                        <span>Canada</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryFrance" name="country" value="France">
                    <label for="countryFrance">
                        <img src="https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg" alt="France Flag">
                        <span>France</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGermany" name="country" value="Germany">
                    <label for="countryGermany">
                        <img src="https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg"
                            alt="Germany Flag">
                        <span>Germany</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryItaly" name="country" value="Italy">
                    <label for="countryItaly">
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/03/Flag_of_Italy.svg" alt="Italy Flag">
                        <span>Italy</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryJapan" name="country" value="Japan">
                    <label for="countryJapan">
                        <img src="https://upload.wikimedia.org/wikipedia/en/9/9e/Flag_of_Japan.svg" alt="Japan Flag">
                        <span>Japan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryChina" name="country" value="China">
                    <label for="countryChina">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Flag_of_China.svg"
                            alt="China Flag">
                        <span>China</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIndia" name="country" value="India">
                    <label for="countryIndia">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg" alt="India Flag">
                        <span>India</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBrazil" name="country" value="Brazil">
                    <label for="countryBrazil">
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/05/Flag_of_Brazil.svg" alt="Brazil Flag">
                        <span>Brazil</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAustralia" name="country" value="Australia">
                    <label for="countryAustralia">
                        <img src="https://upload.wikimedia.org/wikipedia/en/b/b9/Flag_of_Australia.svg"
                            alt="Australia Flag">
                        <span>Australia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMexico" name="country" value="Mexico">
                    <label for="countryMexico">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_Mexico.svg"
                            alt="Mexico Flag">
                        <span>Mexico</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySouthAfrica" name="country" value="South Africa">
                    <label for="countrySouthAfrica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Flag_of_South_Africa.svg"
                            alt="South Africa Flag">
                        <span>South Africa</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryRussia" name="country" value="Russia">
                    <label for="countryRussia">
                        <img src="https://upload.wikimedia.org/wikipedia/en/f/f3/Flag_of_Russia.svg" alt="Russia Flag">
                        <span>Russia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNigeria" name="country" value="Nigeria">
                    <label for="countryNigeria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/79/Flag_of_Nigeria.svg"
                            alt="Nigeria Flag">
                        <span>Nigeria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryArgentina" name="country" value="Argentina">
                    <label for="countryArgentina">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg"
                            alt="Argentina Flag">
                        <span>Argentina</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySouthKorea" name="country" value="South Korea">
                    <label for="countrySouthKorea">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/Flag_of_South_Korea.svg"
                            alt="South Korea Flag">
                        <span>South Korea</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySpain" name="country" value="Spain">
                    <label for="countrySpain">
                        <img src="https://upload.wikimedia.org/wikipedia/en/9/9a/Flag_of_Spain.svg" alt="Spain Flag">
                        <span>Spain</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySaudiArabia" name="country" value="Saudi Arabia">
                    <label for="countrySaudiArabia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg"
                            alt="Saudi Arabia Flag">
                        <span>Saudi Arabia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryTurkey" name="country" value="Turkey">
                    <label for="countryTurkey">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Flag_of_Turkey.svg"
                            alt="Turkey Flag">
                        <span>Turkey</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySweden" name="country" value="Sweden">
                    <label for="countrySweden">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/4c/Flag_of_Sweden.svg" alt="Sweden Flag">
                        <span>Sweden</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNetherlands" name="country" value="Netherlands">
                    <label for="countryNetherlands">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg"
                            alt="Netherlands Flag">
                        <span>Netherlands</span>
                    </label>
                </div>

            </form>
        </div>
    </div>

   <!-- Currency Selection Modal -->
<div id="currencyModal" class="modal">
    <div class="modal-content">
        <h2>Select a Currency</h2>
        <form id="currencyForm" method="POST" action="{{ route('saveCurrency') }}">
            @csrf
            <div class="currency">
                <input type="radio" id="currencyUSD" name="currency" value="USD">
                <label for="currencyUSD">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/USDollar.svg" alt="USD">
                    <span>USD</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyEUR" name="currency" value="EUR">
                <label for="currencyEUR">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5b/Euro_symbol.svg" alt="EUR">
                    <span>EUR</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyGBP" name="currency" value="GBP">
                <label for="currencyGBP">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Pound_Sterling_symbol.svg" alt="GBP">
                    <span>GBP</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyJPY" name="currency" value="JPY">
                <label for="currencyJPY">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Yen_symbol.svg" alt="JPY">
                    <span>JPY</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyAUD" name="currency" value="AUD">
                <label for="currencyAUD">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Australian_Dollar_symbol.svg" alt="AUD">
                    <span>AUD</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyCAD" name="currency" value="CAD">
                <label for="currencyCAD">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ea/Canadian_Dollar_symbol.svg" alt="CAD">
                    <span>CAD</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyCHF" name="currency" value="CHF">
                <label for="currencyCHF">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Swiss_Franc_symbol.svg" alt="CHF">
                    <span>CHF</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyCNY" name="currency" value="CNY">
                <label for="currencyCNY">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/RMB_symbol.svg" alt="CNY">
                    <span>CNY</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyINR" name="currency" value="INR">
                <label for="currencyINR">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Indian_Rupee_symbol.svg" alt="INR">
                    <span>INR</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyBRL" name="currency" value="BRL">
                <label for="currencyBRL">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Brazilian_real_symbol.svg" alt="BRL">
                    <span>BRL</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyZAR" name="currency" value="ZAR">
                <label for="currencyZAR">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/South_African_Rand_symbol.svg" alt="ZAR">
                    <span>ZAR</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyMXN" name="currency" value="MXN">
                <label for="currencyMXN">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/88/MXN_symbol.svg" alt="MXN">
                    <span>MXN</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencySGD" name="currency" value="SGD">
                <label for="currencySGD">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/SGD_symbol.svg" alt="SGD">
                    <span>SGD</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyHKD" name="currency" value="HKD">
                <label for="currencyHKD">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/HKD_symbol.svg" alt="HKD">
                    <span>HKD</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyKRW" name="currency" value="KRW">
                <label for="currencyKRW">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/KRW_symbol.svg" alt="KRW">
                    <span>KRW</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyRUB" name="currency" value="RUB">
                <label for="currencyRUB">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/RUB_symbol.svg" alt="RUB">
                    <span>RUB</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyTRY" name="currency" value="TRY">
                <label for="currencyTRY">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Turkish_Lira_symbol.svg" alt="TRY">
                    <span>TRY</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyIDR" name="currency" value="IDR">
                <label for="currencyIDR">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Indonesian_Rupiah_symbol.svg" alt="IDR">
                    <span>IDR</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyMYR" name="currency" value="MYR">
                <label for="currencyMYR">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Malaysian_Ringgit_symbol.svg" alt="MYR">
                    <span>MYR</span>
                </label>
            </div>
            <div class="currency">
                <input type="radio" id="currencyTHB" name="currency" value="THB">
                <label for="currencyTHB">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/Thai_Baht_symbol.svg" alt="THB">
                    <span>THB</span>
                </label>
            </div>
            <!-- Add more currencies as needed -->
        </form>
    </div>
</div>

   <!-- Final Modal -->
<div id="finalModal" class="modal">
    <div class="modal-content">
        <div class="check-icon" style="text-align: center; margin-bottom: 10px;">
            <i class="fas fa-check-circle" style="color: green; font-size: 48px;"></i>
        </div>
        <h2>Configuration Complete!</h2>
        <p>Plus 500 will now refresh.</p>
    </div>
</div>

<script>
    function showModal(id) {
        document.querySelectorAll('.modal').forEach(modal => modal.style.display = "none");
        document.getElementById(id).style.display = "block";
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Show first modal on page load
        showModal("firstModal");

        // After 5 seconds, show the country selection modal
        setTimeout(() => {
            showModal("countryModal");
        }, 5000);
    });

    document.querySelectorAll('input[name="country"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const formData = new FormData(document.getElementById('countryForm'));

            fetch("{{ route('saveCountry') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    setTimeout(() => {
                        showModal("currencyModal");
                    }, 1000);
                } else {
                    alert("There was an error saving your selection. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });

    document.querySelectorAll('input[name="currency"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const formData = new FormData(document.getElementById('currencyForm'));

            fetch("{{ route('saveCurrency') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    setTimeout(() => {
                        showModal("finalModal");
                        setTimeout(() => {
                            document.getElementById("finalModal").style.display = "none";
                            // Redirect to the home page after the final modal closes
                            setTimeout(() => {
                                window.location.href = "{{route('home') }}";
                            }, 3000); // Delay before redirecting
                        }, 10000);
                    }, 3000);
                } else {
                    alert("There was an error saving your selection. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });
</script>
{{-- 
    @include('user.layouts.footer') --}}