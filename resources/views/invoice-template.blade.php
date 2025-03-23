<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rechnung Nr. RE-2025-0308</title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                color: #333;
            }

            .invoice-container {
                margin: 0 auto;
                padding: 10px;
                background-color: white;
            }

            .invoice-header {
                display: flex;
                justify-content: space-between;
            }

            .company-details {
                flex: 1;
            }

            .company-name {
                font-size: 28px;
                font-weight: bold;
                color: #2c5282;
                margin-bottom: 5px;
            }

            .company-address {
                font-size: 14px;
                line-height: 1.5;
            }

            .invoice-info {
                text-align: right;
                flex: 1;
            }

            .invoice-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 15px;
                color: #2c5282;
            }

            .invoice-details {
                font-size: 14px;
                line-height: 1.6;
            }

            .customer-section {
                margin-bottom: 30px;
            }

            .section-title {
                font-size: 16px;
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 10px;
                margin-top: 15px;
                color: #555;
                border-bottom: 1px solid #ddd;
                padding-bottom: 5px;
            }

            .customer-details {
                font-size: 14px;
                line-height: 1.5;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
            }

            th {
                background-color: #f2f2f2;
                padding: 12px;
                text-align: left;
                font-size: 14px;
                font-weight: bold;
                color: #555;
                border-bottom: 2px solid #ddd;
            }

            td {
                padding: 12px;
                text-align: left;
                font-size: 14px;
                border-bottom: 1px solid #ddd;
            }

            .text-right {
                text-align: right;
            }

            .text-center {
                text-align: center;
            }

            .total-section {
                margin-left: auto;
                width: 300px;
            }

            .total-row {
                display: flex;
                justify-content: space-between;
                padding: 8px 0;
                font-size: 14px;
            }

            .total-row.final {
                font-weight: bold;
                font-size: 16px;
                border-top: 1px solid #ddd;
                padding-top: 12px;
                margin-top: 8px;
            }

            .payment-info {
                margin: 30px 0;
                padding: 15px;
                background-color: #f8f8f8;
                border-left: 4px solid #2c5282;
            }

            .payment-info h3 {
                margin-top: 0;
                font-size: 16px;
                color: #2c5282;
            }

            .payment-details {
                font-size: 14px;
                line-height: 1.5;
            }

            .footer {
                margin-top: 50px;
                padding-top: 20px;
                border-top: 1px solid #ddd;
                font-size: 12px;
                color: #777;
                text-align: center;
                line-height: 1.5;
            }

            @media print {
                body {
                    background-color: white;
                    padding: 0;
                }

                .invoice-container {
                    box-shadow: none;
                    padding: 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="invoice-container">
            <div class="invoice-header">
                <div class="company-details">
                    <div class="company-name">{{ $sellerName }}</div>
                    <div class="company-address">
                        {{ $sellerAddress["line1"] }}
                        <br />

                        @if (! empty($sellerAddress["line2"]))
                            {{ $sellerAddress["line2"] }}
                            <br />
                        @endif

                        @if (! empty($sellerAddress["line3"]))
                            {{ $sellerAddress["line3"] }}
                            <br />
                        @endif

                        {{ $sellerAddress["postCode"] }} {{ $sellerAddress["city"] }}
                        <br />
                        {{ $sellerAddress["country"] }}
                        <br />
                        Tel: {{ $sellerContact["contactPhoneNo"] }}
                        <br />

                        @if (! empty($sellerAddress["contactFaxNo"]))
                            {{ $sellerAddress["contactFaxNo"] }}
                            <br />
                        @endif

                        E-Mail: {{ $sellerContact["contactEmailAddress"] }}
                    </div>
                </div>
                <div class="invoice-info">
                    <div class="invoice-title">RECHNUNG</div>
                    <div class="invoice-details">
                        Rechnungsnummer: {{ $invoiceNumber }}
                        <br />
                        Rechnungsdatum: {{ $deliveryDate }}
                        <br />
                        Leistungszeitraum: {{ $billingPeriod }}
                        <br />
                        Kundennummer: {{ $contractReferencedDocument }}
                        <br />
                        Umsatzsteuer-ID: {{ $buyerVATRegistrationNumber }}
                    </div>
                </div>
            </div>

            <div class="customer-section">
                <div class="section-title">Rechnungsempfänger</div>
                <div class="customer-details">
                    <strong>{{ $buyerName }}</strong>
                    <br />
                    z.Hd. {{ $buyerContact["contactPersonName"] }}
                    <br />
                    {{ $buyerAddress["line1"] }}
                    <br />
                    @if (! empty($buyerAddress["line2"]))
                        {{ $buyerAddress["line2"] }}
                        <br />
                    @endif

                    @if (! empty($buyerAddress["line3"]))
                        {{ $buyerAddress["line3"] }}
                        <br />
                    @endif

                    {{ $buyerAddress["postCode"] }} {{ $buyerAddress["city"] }}
                    <br />
                    {{ $buyerAddress["country"] }}
                    <br />
                    <br />
                    Ihre Bestellnummer: B-2025-0278
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Pos.</th>
                        <th>Beschreibung</th>
                        <th class="text-center">Menge</th>
                        <th class="text-center">Einheit</th>
                        <th class="text-right">Einzelpreis</th>
                        <th class="text-right">Betrag (EUR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position["positionId"] }}</td>
                            <td>{{ $position["productDetails"] }}</td>
                            <td class="text-center">{{ $position["quantity"] }}</td>
                            <td class="text-center">{{ $position["unitType"] }}</td>
                            <td class="text-right">{{ $position["netPrice"] }} €</td>
                            <td class="text-right">{{ $position["lineSummation"] }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-section">
                <div class="total-row">
                    <span>Nettobetrag:</span>
                    <span>{{ $summation["lineTotalAmount"] }} €</span>
                </div>
                @foreach ($tax as $taxItem)
                    <div class="total-row">
                        <span>zzgl. {{ $taxItem["rateApplicablePercent"] }}% Mehrwertsteuer:</span>
                        <span>{{ $taxItem["calculatedAmount"] }} €</span>
                    </div>
                @endforeach

                <div class="total-row final">
                    <span>Rechnungsbetrag:</span>
                    <span>{{ $summation["grandTotalAmount"] }} €</span>
                </div>
            </div>

            <div class="payment-info">
                <h3>Zahlungsinformationen</h3>
                <div class="payment-details">
                    <p>
                        Bitte überweisen Sie den Rechnungsbetrag innerhalb von {{ $paymentDeadline }} Tagen auf unser
                        unten genanntes Konto.
                    </p>
                    <p>
                        <strong>Bankverbindung:</strong>
                        <br />
                        {{ $paymentBankName }}
                        <br />
                        IBAN: {{ $paymentIBAN }}
                        <br />
                        BIC: {{ $paymentBIC }}
                    </p>
                </div>
            </div>

            <div class="footer">
                {{-- <p> --}}
                {{-- <strong>Musterfirma GmbH</strong> --}}
                {{-- | Geschäftsführer: Erika Musterfrau | Amtsgericht Berlin-Charlottenburg HRB 123456 --}}
                {{-- </p> --}}
                <p>Steuernummer: {{ $sellerTaxNumber }} | USt-IdNr.: {{ $sellerVATRegistrationNumber }}</p>
                <p>{{ $paymentBankName }} | IBAN: {{ $paymentIBAN }} | BIC: {{ $paymentBIC }}</p>
            </div>
        </div>
    </body>
</html>
