# Hosting Any WordPress Project (LocalWP → Hostinger)

So if you have completed your WordPress project using LocalWP.  
Now just have to move it online using Hostinger.

---

## Things To Check Before Starting

- WordPress project running properly in LocalWP environment.  
- Hosting + domain purchased on Hostinger.  
 

---

# Step 1 – Export Website from LocalWP

1. Open the site inside **LocalWP**
2. Click **WP Admin**
// A plugin is required 
3. Go to → `Plugins → Add New`
4. Install **All-in-One WP Migration**
5. Activate the plugin
6. Go to → `All-in-One WP Migration → Export`
7. Choose **Export to → File**
8. Download the `.wpress` file to my computer

This file contains everything (website files + database).

---

# Step 2 – Install Fresh WordPress on Hostinger
// Already installed on our hostinger account

1. Login to **Hostinger hPanel**
2. Go to **Websites**
3. Click **+ Add Website**
4. Choose **Create a New Website**
5. Select **WordPress**
6. Enter:
   - Admin Email  
   - Username  
   - Password  
   - Website Title  
7. Click **Install**

// Now WordPress is installed on my domain.

---

# Step 3 – Import My LocalWP Website

1. Open → `mydomain.com/wp-admin`
2. Login to the dashboard
3. Go to → `Plugins → Add New`
4. Install **All-in-One WP Migration**
5. Activate it
6. Go to → `All-in-One WP Migration → Import`
7. Upload the `.wpress` file.
8. Click **Proceed**

// Now LocalWP website is transferred to the live server.

---

# Step 4 – Fix Permalinks

After importing:
1. Go to → `Settings → Permalinks`
2. Click **Save Changes**

// No need to change anything — just click Save once.
This refreshes all links.

---

# Step 5 – Enable SSL (HTTPS)

Back in Hostinger:
1. Go to → `Security → SSL`
2. Click **Install SSL**

After activation, the website should open with: `https://mydomain.com`

- If HTTPS is not working immediately:
Go to WordPress → Settings → General  
Update both URLs to `https://mydomain.com`.


---


# If Upload Size Error Happens

If the `.wpress` file is too large:

1. Go to → `Advanced → PHP Configuration`
2. Increase:
   - `upload_max_filesize`
   - `post_max_size`
   - `memory_limit`
3. Save changes
4. Try importing again


---


# Final Checklist

- Homepage loads properly  
- Images are visible  
- Links are working  
- HTTPS is enabled  
- Admin panel accessible  


If something doesn’t work, usually:
- Permalinks need to be saved again  
- SSL is not enabled  

