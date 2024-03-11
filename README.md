# PHP Image Downloader

This PHP script allows users to download images from the web by entering the image URL. It features a simple UI for pasting the image URL, viewing a preview of the image, and downloading it. The script uses jQuery for handling events like focusing out of the input field and clicking the download button.

## Features

- **URL Validation**: Ensures that the input is a valid image URL (supports jpg, gif, and png formats).
- **Image Preview**: Displays a preview of the image before downloading.
- **Download Functionality**: Downloads the image to the user's device.

## Requirements

- PHP 7.x or newer
- curl extension enabled in PHP
- A web server like Apache or Nginx

## Installation

1. Clone or download this repository to your web server's document root.
2. Ensure that the `curl` extension is enabled in your PHP configuration.
3. Access the script via your web browser by navigating to the directory where you've placed the script files.

## Usage

1. Open the script in a web browser; you will see an input field and a download button.
2. Paste the URL of the image you wish to download into the input field.
3. The script will validate the URL and display a preview of the image.
4. Click the "Download" button to download the image. The image will be downloaded with its original filename.

## Notes

- The script currently supports images in jpg, gif, and png formats. 
- Make sure your PHP installation has the `curl` extension enabled, as it's required for fetching the images.
- This script is intended for educational purposes and should be used responsibly.

