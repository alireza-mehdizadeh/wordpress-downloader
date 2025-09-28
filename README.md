# 📦 WordPress Auto Downloader & Installer (PHP)

This PHP script automatically **downloads and installs WordPress** from the official **WordPress.org** website.  
It fetches the latest release (or a specific version if provided), extracts the ZIP archive, moves the files to the current directory, and cleans up all temporary files — including removing itself after installation.

---

## ⚡ Features

- ✅ Download the **latest WordPress** version by default.
- ✅ Download a **specific WordPress version** using a URL parameter.
- ✅ Automatically extract the downloaded ZIP file.
- ✅ Move WordPress files to the project root.
- ✅ Remove temporary files and **delete the installer itself** once finished.

---

## 📂 Folder Structure

During the installation process, the script temporarily creates the following structure:
project/
├─ downloads/ ← Temporary storage for the WordPress ZIP file
├─ wordpress/ ← Extracted WordPress files (temporary)
└─ installation.php ← This installer script (will delete itself after completion)

After the installation is complete, all temporary folders and the script itself are removed, leaving only the final WordPress files in the root directory.

---

## 🚀 How to Use

1. **Upload the Script**  
   Place the `installation.php` file in an **empty** directory on your server.

2. **Run the Installer**  
   Open your browser and navigate to:
   https://yourdomain.com/installation.php
   This will download and install the **latest WordPress version**.

3. **Install a Specific Version** _(optional)_  
   To install a specific WordPress version, append the `version` parameter to the URL:
   https://yourdomain.com/installation.php?version=6.7
   Replace `6.7` with the desired WordPress version.

---

## ⚠️ Security Notes

- The script **automatically deletes itself** after installation.
- If for any reason it does not delete itself, **remove it manually** to prevent unauthorized access.
- Always run this installer in an **empty directory** to avoid overwriting existing files.

---

## 💡 Example

- Latest version:
  https://example.com/installation.php

- Specific version:
  https://example.com/installation.php?version=6.7
