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
                padding: 30px;
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
                    <div class="company-name">Musterfirma GmbH</div>
                    <div class="company-address">
                        Musterstraße 123
                        <br />
                        10115 Berlin
                        <br />
                        Deutschland
                        <br />
                        Tel: +49 30 123456789
                        <br />
                        E-Mail: info@musterfirma.de
                        <br />
                        Web: www.musterfirma.de
                    </div>
                </div>
                <div class="invoice-info">
                    <div class="invoice-title">RECHNUNG</div>
                    <div class="invoice-details">
                        Rechnungsnummer: RE-2025-0308
                        <br />
                        Rechnungsdatum: 08.03.2025
                        <br />
                        Leistungszeitraum: 01.02.2025 - 28.02.2025
                        <br />
                        Kundennummer: KD-2023-0042
                        <br />
                        Umsatzsteuer-ID: DE123456789
                    </div>
                </div>
            </div>

            <div class="customer-section">
                <div class="section-title">Rechnungsempfänger</div>
                <div class="customer-details">
                    <strong>Beispiel AG</strong>
                    <br />
                    z.Hd. Herrn Max Mustermann
                    <br />
                    Beispielweg 42
                    <br />
                    20354 Hamburg
                    <br />
                    Deutschland
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
                    <tr>
                        <td>1</td>
                        <td>Website-Optimierung</td>
                        <td class="text-center">15</td>
                        <td class="text-center">Std.</td>
                        <td class="text-right">95,00 €</td>
                        <td class="text-right">1.425,00 €</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Content-Erstellung</td>
                        <td class="text-center">8</td>
                        <td class="text-center">Std.</td>
                        <td class="text-right">85,00 €</td>
                        <td class="text-right">680,00 €</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Premium-Hosting (monatlich)</td>
                        <td class="text-center">1</td>
                        <td class="text-center">Monat</td>
                        <td class="text-right">49,90 €</td>
                        <td class="text-right">49,90 €</td>
                    </tr>
                </tbody>
            </table>

            <div class="total-section">
                <div class="total-row">
                    <span>Nettobetrag:</span>
                    <span>2.154,90 €</span>
                </div>
                <div class="total-row">
                    <span>zzgl. 19% Mehrwertsteuer:</span>
                    <span>409,43 €</span>
                </div>
                <div class="total-row final">
                    <span>Rechnungsbetrag:</span>
                    <span>2.564,33 €</span>
                </div>
            </div>

            <div class="payment-info">
                <h3>Zahlungsinformationen</h3>
                <div class="payment-details">
                    <p>
                        Bitte überweisen Sie den Rechnungsbetrag innerhalb von 14 Tagen auf unser unten genanntes Konto.
                    </p>
                    <p>
                        <strong>Bankverbindung:</strong>
                        <br />
                        Deutsche Geschäftsbank
                        <br />
                        IBAN: DE12 3456 7890 1234 5678 90
                        <br />
                        BIC: DEUTDEBBXXX
                    </p>
                </div>
            </div>

            <div class="footer">
                <p>
                    <strong>Musterfirma GmbH</strong>
                    | Geschäftsführer: Erika Musterfrau | Amtsgericht Berlin-Charlottenburg HRB 123456
                </p>
                <p>Steuernummer: 18/765/43210 | USt-IdNr.: DE123456789</p>
                <p>Deutsche Geschäftsbank | IBAN: DE12 3456 7890 1234 5678 90 | BIC: DEUTDEBBXXX</p>
            </div>
        </div>
    </body>
</html>
