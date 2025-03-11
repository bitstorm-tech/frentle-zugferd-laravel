<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rechnungsvorlage</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <!-- @vite(["resources/css/app.css", "resources/js/app.js"]) -->
        <style>
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
        <div class="mb-8 flex justify-between">
            <div class="flex flex-col">
                <div class="mb-2 text-2xl text-blue-900"><strong>Musterfirma GmbH</strong></div>
                <div class="flex flex-col text-sm">
                    <span>Musterstraße 123</span>
                    <span>10115 Berlin</span>
                    <span>Deutschland</span>
                    <span>Tel: +49 30 123456789</span>
                    <span>E-Mail: info@musterfirma.de</span>
                    <span>Web: www.musterfirma.de</span>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <div class="mb-2 text-2xl text-blue-900"><strong>RECHNUNG</strong></div>
                <div class="flex flex-col items-end text-sm">
                    <span>Rechnungsnummer: RE-2025-0308</span>
                    <span>Rechnungsdatum: 08.03.2025</span>
                    <span>Leistungszeitraum: 01.02.2025 - 28.02.2025</span>
                    <span>Kundennummer: KD-2023-0042</span>
                    <span>Umsatzsteuer-ID: DE123456789</span>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="mb-2 border-b border-gray-300 pb-2 text-gray-600 uppercase">
                <strong>Rechnungsempfänger</strong>
            </div>
            <div class="flex flex-col text-sm">
                <strong>Beispiel AG</strong>
                <span>z.Hd. Herrn Max Mustermann</span>
                <span>Beispielweg 42</span>
                <span>20354 Hamburg</span>
                <span>Deutschland</span>
                <span class="mt-5">Ihre Bestellnummer: B-2025-0278</span>
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
        <!-- ------------------- -->
        <!-- Payment information -->
        <!-- ------------------- -->
        <div class="mb-12 border-l-4 border-l-blue-800 bg-gray-200 p-2">
            <h3 class="text-blue-900"><strong>Zahlungsinformationen</strong></h3>
            <div class="flex flex-col text-sm">
                <p class="my-3">
                    Bitte überweisen Sie den Rechnungsbetrag innerhalb von 14 Tagen auf unser unten genanntes Konto.
                </p>
                <strong>Bankverbindung:</strong>
                <span>Deutsche Geschäftsbank</span>
                <span>IBAN: DE12 3456 7890 1234 5678 90</span>
                <span>BIC: DEUTDEBBXXX</span>
            </div>
        </div>

        <!-- ------ -->
        <!-- Footer -->
        <!-- ------ -->
        <div class="flex flex-col items-center gap-3 border-t border-gray-300 pt-2 text-sm text-gray-500">
            <p>
                <strong>Musterfirma GmbH</strong>
                | Geschäftsführer: Erika Musterfrau | Amtsgericht Berlin-Charlottenburg HRB 123456
            </p>
            <p>Steuernummer: 18/765/43210 | USt-IdNr.: DE123456789</p>
            <p>Deutsche Geschäftsbank | IBAN: DE12 3456 7890 1234 5678 90 | BIC: DEUTDEBBXXX</p>
        </div>
    </body>
</html>
