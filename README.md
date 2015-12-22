# Επισκόπηση

Εφαρμογή Διαχείρισης Αδειών υπαλλήλων Αιρετής Περιφέρειας.

## Τεχνικά Χαρακτηριστικά

* Χρήση Bootstrap SB Admin V2
* Διασύνδεση με βάση δεδομένων MySQL
* Χρήση PHP για περισσότερη ευελιξία και ασφάλεια
* Δυνατότητα εύκολης προσαρμογής για δημιουργία νέας εφαρμογής

## Λειτουργικά Χαρακτηριστικά

* Login-Logout χρηστών
* Επισκόπηση αριθμού αιτήσεων προς έγκριση και εγκεκριμένων αιτήσεων
* Φόρμα υποβολής αίτησης άδειας
* Πίνακας αιτήσεων υπαλλήλου και αιτήσεων άλλων υπαλλήλων προς έγκριση
* Ειδοποίηση (με email) υπαλλήλων κατά την υποβολή ή έγκριση/απόρριψη της αίτησης
* Καρτέλα υπαλλήλου με χρήσιμα στοιχεία και πληροφορίες
* Στατιστικά αξιοποιώντας τα δεδομένα της βάσης δεδομένων
* Εξαγωγή αίτησης σε PDF
* Αναφορές σχετικά με παρόντες υπαλλήλους, απόντες υπαλλήλους, απόντες μεταξύ διαστήματος και μηνιαίες-ετήσιες αναφορές
* Εξαγωγή δεδομένων αναφορών σε XLS
* Ειδοποίηση υπαλλήλων και διευθυντών με e-mail κατά την υποβολή/έγκριση/απόρριψη μιας άδειας


# Πλατφόρμα Υλοποίησης

Η εφαρμογή χρησιμοποιεί Bootsrap μαζί με Admin Theme τα οποία παραμετροποιήθηκαν χρησιμοποιόντας PHP και MySQL με τα ακόλουθα εργαλεία:

* NetBeans IDE για προγραμματισμό PHP-HTML5-Javascript
* MySQL Workbench για σχεδίαση και κατασκευή βάσης δεδομένων
* IIS Server για διαδικτυακές δοκιμές σε πραγματικό χρόνο

# Ελάχιστες Απαιτήσεις

Για να λειτουργήσει η εφαρμογή απαιτείται κάποιος Web Server με PHP 5.4 και άνω και MySQL 5.5. Η εφαρμογή δοκιμάστηκε σε Apache + IIS web servers

# Εγκατάσταση

Η εγκατάσταση είναι ιδιαίτερα απλή καθώς απλά γίνεται επικόλληση των φακέλων στη διαδρομή htdocs του webserver. Έπειτα, με χρήση κάποιου εργαλείου MySQL όπως
phpmyadmin, γίνεται εισαγωγή του αρχείου .sql ώστε να δημιουργηθεί η βάση δεδομένων στον server. Η βάση δεδομένων περιέχει μερικά δεδομένα αρχικοποίησης για 
εύκολη πρόσβαση. Πληροφορίες για την πρόσβαση βρίσκονται στο wiki

## Σε ποίους απευθύνεται - Κοινότητες Χρηστών - Προγραμματιστών(Developers) ##

* Η εφαρμογή απευθύνεται σε οποιαδήποτε δημόσια υπηρεσία επιθυμεί να καταργήσει τις έγγραφες αιτήσεις άδειας. Σχεδιάστηκε με τέτοιο τρόπο ώστε να είναι
εύκολη στη χρήση και γρήγορη στην διεκπεραίωση των αιτήσεων.
* Αρκετό ενδιαφέρον θα βρουν οι προγραμματιστές που ασχολούνται με προγραμματισμό Web εφαρμογών (HTML, PHP, MySQL) καθώς και οι χρήστες που 
επιθυμούν να επεκτείνουν ένα έργο ανοικτού κώδικα που έχει ευρεία χρήση σε κάποια υπηρεσία.

# Wiki

Στο [Wiki](https://github.com/ellak-monades-aristeias/adeies-form/wiki) υπάρχουν λεπτομέρειες σχετικά με κάθε εργασία που επιτελείται απο κάθε ενότητα της διαδικτυακής εφαρμογής

# Issues

Δεν υπάρχουν προς το παρόν issues καθώς η εφαρμογή αναπτύσσεται χωρίς προβλήματα και σύμφωνα με τις αρχικές απαιτήσεις

##Description in English

#Leave Management System

With this system, every public sector is able to digitize the leaves' applications and to improve their submit and review procedure.

-Every employee, is able to connect to the system and submit an application to ask his supervisor for a leave.
-Then, the supervisor will review the application and will approve or deny it.
-If the application is approved, the employee is notified and the days off are subtracted for his total days.
-There are available useful statistics for the supervisor to have a complete view of the employees that are away, that are going to be away etc.
-Also, export to PDF and XLS is available along with e-mail notifications for every new submission.