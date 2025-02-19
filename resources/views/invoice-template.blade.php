<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice #INV-12345</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    .invoice-container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
    .invoice-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .invoice-header h1 {
      margin: 0;
    }
    .invoice-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .invoice-details .section {
      width: 45%;
    }
    .invoice-details .section h3 {
      margin-bottom: 5px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
    tfoot td {
      font-weight: bold;
    }
    .total {
      text-align: right;
    }
    .footer {
      text-align: center;
      font-size: 0.9em;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="invoice-container">
    <div class="invoice-header">
      <h1>Invoice</h1>
      <p><strong>Invoice #INV-12345</strong></p>
    </div>
    <div class="invoice-details">
      <div class="section">
        <h3>Billed To:</h3>
        <p>
          John Doe<br>
          1234 Main Street<br>
          Anytown, CA 12345<br>
          USA
        </p>
      </div>
      <div class="section">
        <h3>Invoice Details:</h3>
        <p>
          <strong>Date:</strong> January 1, 2025<br>
          <strong>Due Date:</strong> January 15, 2025<br>
          <strong>Terms:</strong> Net 15
        </p>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th>Description</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Service A</td>
          <td>2</td>
          <td>$100.00</td>
          <td>$200.00</td>
        </tr>
        <tr>
          <td>Service B</td>
          <td>1</td>
          <td>$150.00</td>
          <td>$150.00</td>
        </tr>
        <tr>
          <td>Product C</td>
          <td>3</td>
          <td>$50.00</td>
          <td>$150.00</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="total">Subtotal:</td>
          <td>$500.00</td>
        </tr>
        <tr>
          <td colspan="3" class="total">Tax (10%):</td>
          <td>$50.00</td>
        </tr>
        <tr>
          <td colspan="3" class="total">Total:</td>
          <td>$550.00</td>
        </tr>
      </tfoot>
    </table>
    <div class="footer">
      <p>If you have any questions regarding this invoice, please contact us at <a href="mailto:info@example.com">info@example.com</a>.</p>
    </div>
  </div>
</body>
</html>

