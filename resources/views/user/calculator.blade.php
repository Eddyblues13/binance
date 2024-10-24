@include('user.layouts.header')
<main>
    <div class="container-fluid">

        <div class="col-12  col-lg-12 col-xl-12 mt-3">
            <div class="card">
                <div class="col-12 col-lg-12 col-xl-12 mt-3">
           

                    <div class="converter-container">
                        <h3>Converter</h3>
                        
                        <div class="converter">
                            <!-- Amount input -->
                            <label for="amount">Amount:</label>
                            <input type="number" id="amount" placeholder="Enter amount" step="0.01" />
                    
                            <!-- From currency -->
                            <label for="from-currency">From Currency:</label>
                            <select id="from-currency">
                                <!-- Crypto Currencies -->
                                <option value="bitcoin">Bitcoin (BTC)</option>
                                <option value="ethereum">Ethereum (ETH)</option>
                                <option value="litecoin">Litecoin (LTC)</option>
                                <option value="ripple">Ripple (XRP)</option>
                                <option value="cardano">Cardano (ADA)</option>
                                <!-- Fiat Currencies -->
                                <option value="usd">US Dollar (USD)</option>
                                <option value="eur">Euro (EUR)</option>
                                <option value="gbp">British Pound (GBP)</option>
                                <option value="jpy">Japanese Yen (JPY)</option>
                                <option value="cad">Canadian Dollar (CAD)</option>
                                <option value="aud">Australian Dollar (AUD)</option>
                            </select>
                    
                            <!-- To currency -->
                            <label for="to-currency">To Currency:</label>
                            <select id="to-currency">
                                <!-- Crypto Currencies -->
                                <option value="bitcoin">Bitcoin (BTC)</option>
                                <option value="ethereum">Ethereum (ETH)</option>
                                <option value="litecoin">Litecoin (LTC)</option>
                                <option value="ripple">Ripple (XRP)</option>
                                <option value="cardano">Cardano (ADA)</option>
                                <!-- Fiat Currencies -->
                                <option value="usd">US Dollar (USD)</option>
                                <option value="eur">Euro (EUR)</option>
                                <option value="gbp">British Pound (GBP)</option>
                                <option value="jpy">Japanese Yen (JPY)</option>
                                <option value="cad">Canadian Dollar (CAD)</option>
                                <option value="aud">Australian Dollar (AUD)</option>
                            </select>
                    
                            <!-- Exchange rate display -->
                            <div id="exchange-rate"></div>
                    
                            <!-- Convert button -->
                            <button onclick="convertCurrency()">Convert Now</button>
                        </div>
                    
                        <div id="conversion-result" class="result"></div>
                    </div>
                    

        <br><br><br>
                
        <!-- send all users email -->
    </div>
</div>
</div>
</div>
<!-- END: Card DATA-->
</div>

</main>
        
       <script>
        // API URL for fetching real-time prices
const apiURL = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,litecoin,ripple,cardano&vs_currencies=usd,eur,gbp,jpy,cad,aud';

// Fetch real-time prices from CoinGecko API
async function getRates() {
    const response = await fetch(apiURL);
    return response.json();
}

async function convertCurrency() {
    const fromCurrency = document.getElementById('from-currency').value;
    const toCurrency = document.getElementById('to-currency').value;
    const amount = parseFloat(document.getElementById('amount').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Please enter a valid amount.');
        return;
    }

    // Get rates
    const rates = await getRates();

    // Check if currencies exist in the API response
    if (!rates[fromCurrency] || !rates[fromCurrency][toCurrency]) {
        alert('Conversion not available for selected currencies.');
        return;
    }

    // Calculate conversion
    const rate = rates[fromCurrency][toCurrency.toLowerCase()];
    const convertedAmount = rate * amount;

    // Display the result
    document.getElementById('conversion-result').innerHTML = 
        `${amount} ${fromCurrency.toUpperCase()} = ${convertedAmount.toFixed(6)} ${toCurrency.toUpperCase()}`;

    // Display the exchange rate
    document.getElementById('exchange-rate').innerHTML = 
        `Exchange Rate: 1 ${fromCurrency.toUpperCase()} = ${rate.toFixed(6)} ${toCurrency.toUpperCase()}`;
}

// Call getRates on page load to ensure real-time data is fetched
getRates();

       </script>
        

        <style>

body {
    font-family: 'Arial', sans-serif;
    /* background-color: #f0f3f7; */
}

.converter-container {
    max-width: 600px;
    margin: 60px auto;
    padding: 25px;
    /* background: white; */
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.converter-container h3 {
    font-size: 28px;
    font-weight: bold;
    color: #0056b3;
    margin-bottom: 25px;
}

.converter {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    text-align: left;
}

input, select {
    padding: 14px;
    font-size: 18px;
    border: 2px solid #dcdfe2;
    border-radius: 8px;
    /* background-color: #f9fafc; */
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    outline: none;
    border-color: #007bff;
}

button {
    padding: 15px;
    border: none;
    border-radius: 10px;
    background-color: #007bff;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.result, #exchange-rate {
    margin-top: 20px;
    font-size: 22px;
    font-weight: bold;
    color: #333;
}

        </style>
@include('user.layouts.footer')