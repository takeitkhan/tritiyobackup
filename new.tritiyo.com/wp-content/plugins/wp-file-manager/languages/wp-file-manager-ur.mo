��    �      �  �   �
      �  �   �  �   2  %   �  =     .   ?  %   n  �   �  �   ~  a   *  G   �  J   �  I     %  i  �   �  �   +  A   �  ;   $  <   `  5   �  ;   �  G     <   W  0   �  =   �  ;     <   ?  ;   |  <   �     �     �  �     �   �  7   8  7   p  /   �  ,   �  -        3     D  
   P     [     k     �     �     �     �     �          /      3     T     \     d     k     ~     �     �     �     �     �     �     �  &        2     :     C     J     S     h     o     �  #   �     �     �  %   �     �               8      Q  @   r  �   �     m     �     �     �     �  �   �     H      U      l      }      �      �   	   �   .   �      �      �      	!     !!  	   >!     H!     W!     f!  P   l!  Q   �!     "     "  6   "     L"  $   h"     �"     �"     �"     �"     �"     �"  Q   	#     [#     c#  %   �#  -   �#     �#     �#     �#      $  "   $     1$     I$     Q$     Y$  	   f$     p$  
   ~$     �$     �$     �$     �$  !   �$     �$     %     %     7%     I%  4   Z%     �%     �%  $   �%     �%     �%     �%     &     &     !&     ;&     X&     r&     �&     �&     �&     �&     �&     �&  %   '     ,'     3'     <'      L'     m'  �   �'     2(  *   J(  �  u(  :  *  +  R+  D   ~,  s   �,  M   7-  H   �-  �  �-  =  d/  �   �0  �   `1  �   �1  �   q2  %  �2  $  4  F  >5  d   �6  [   �6  Z   F7  G   �7  Y   �7  a   C8  \   �8  7   9  U   :9  R   �9  Q   �9  Y   5:  S   �:     �:  +   �:    ;  	  .<  �   8=  r   �=  [   1>  K   �>  M   �>     '?     G?     c?  "   x?  K   �?  0   �?  E   @     ^@  >   {@  <   �@  @   �@     8A  1   PA     �A     �A     �A  &   �A      �A     B  0   "B  ;   SB     �B     �B      �B  8   �B  O   C     _C     yC     �C     �C  (   �C     �C  5   �C  %   0D  J   VD  .   �D  *   �D  a   �D  (   ]E  '   �E  :   �E      �E  2   
F  n   =F  �  �F  &   GH  H   nH     �H  
   �H     �H  @  �H     (J     EJ     bJ     }J     �J  /   �J     �J  M   �J  /   ,K  "   \K  ,   K  ,   �K     �K  (   �K  $   L     ;L  �   CL  �   �L     xM     �M  m   �M  5   N  J   8N     �N     �N  3   �N  D   �N  1   *O  /   \O  �   �O     DP  :   RP  K   �P  Z   �P     4Q      CQ     dQ  #   �Q  J   �Q  ?   �Q     3R     ER  "   TR  	   wR     �R     �R     �R  $   �R     �R  /   S  ?   7S  (   wS     �S  &   �S     �S     �S  J   T     aT  3   pT  J   �T     �T  #   U  +   +U     WU     \U  *   lU  5   �U  3   �U  2   V  1   4V  4   fV  /   �V     �V     �V  3   �V  M   -W     {W     �W     �W  8   �W  (   �W    X  .   *Y  P   YY            E   �   �   �       �   Q   $          A       B   R          �   #   i   '   �           �          s      I      �       n   v   `          �       ~   �       	   M   �   q   �   �   �   �      @                 �   r   =   a   �   o   1   �   0       f   d   ^       z   �          (   
   ,       �       {              U   9   �   h       ]   &           .   �   �   [   S   C   �   ;   K   4   w       D   �   �   V       �       8      y   �   �       6       �   �   c   u   |   _          t   �   W   Z       X       T          !   x   p       �   N   b   �          2       5              �   �   �                 �   /   \   Y   �       }   O       J   l      )   ?           +       �         >   3   �   7   %   m   <           �           j                 �   e       �   H   g           F   k   P              G       �      :   -   �   *      "              L               ->  It will ban particular users by just putting their ids seprated by commas(,). If user is Ban then they will not able to access wp file manager on front end. -> * for all operations and to allow some operation you can mention operation name as like, allowed_operations="upload,download". Note: seprated by comma(,). Default: * -> File Manager Theme. Default: Light -> File Modified or Create date format. Default: d M, Y h:i A -> File manager Language. Default: English(en) -> Filemanager UI View. Default: grid -> Here "test" is the name of folder which is located on root directory, or you can give path for sub folders as like "wp-content/plugins". If leave blank or empty it will access all folders on root directory. Default: Root directory -> It will allow all roles to access file manager on front end or You can simple use for particular user roles as like allowed_roles="editor,author" (seprated by comma(,)) -> It will lock mentioned in commas. you can lock more as like ".php,.css,.js" etc. Default: Null -> for access to read files permission, note: true/false, default: true -> for access to write files permissions, note: true/false, default: false -> it will hide mentioned here. Note: seprated by comma(,). Default: Null <code>[wp_file_manager view="list" lang="en" theme="light" dateformat="d M, Y h:i A" allowed_roles="editor,author" access_folder="wp-content/plugins" write = "true" read = "false" hide_files = "kumar,abc.php" lock_extensions=".php,.css" allowed_operations="upload,download" ban_user_ids="2,3"] <code>[wp_file_manager]</code> -> It will show file manager on front end. But only Administrator can access it and will control from file manager settings. <code>[wp_file_manager_admin]</code> -> It will show file manager on front end. You can control all settings from file manager settings. It will work same as backend WP File Manager. <span class="fm_console_error">Nothing selected for backup</span> <span class="fm_console_error">Others backup failed.</span> <span class="fm_console_error">Plugins backup failed.</span> <span class="fm_console_error">Security Issue.</span> <span class="fm_console_error">Themes backup failed.</span> <span class="fm_console_error">Unable to create database backup.</span> <span class="fm_console_error">Uploads backup failed.</span> <span class="fm_console_success">All Done</span> <span class="fm_console_success">Database backup done.</span> <span class="fm_console_success">Others backup done.</span> <span class="fm_console_success">Plugins backup done.</span> <span class="fm_console_success">Themes backup done.</span> <span class="fm_console_success">Uploads backup done.</span> Action Actions upon selected backup(s) Admin can restrict actions of any user. Also hide files and folders and can set different - different folders paths for different users. Admin can restrict actions of any userrole. Also hide files and folders and can set different - different folders paths for different users roles. After enable trash, your files will go to trash folder. After enabling this all files will go to media library. Are you sure want to remove selected backup(s)? Are you sure you want to delete this backup? Are you sure you want to restore this backup? Backup / Restore Backup Date Backup Now Backup Options: Backup data (click to download) Backup files will be under Backup is running, please wait Backup not found! Backup removed successfully! Backup successfully deleted. Backups removed successfully! Ban Browser and OS (HTTP_USER_AGENT) Buy PRO Buy Pro Cancel Change Theme Here: Code-editor View Confirm Copy files or folders Currently no backup(s) found. DELETE FILES Dark Database Backup Database backup done on date  Database backup restored successfully. Default Default: Delete Deselect Dismiss this notice. Donate Download Files Logs Download files Duplicate or clone a folder or file Edit Files Logs Edit a file Enable Files Upload to Media Library? Enable Trash? Existing Backup(s) Extract archive or zipped file File Manager - Shortcode File Manager - System Properties File Manager Root Path, you can change according to your choice. File Manager has a code editor with multiple themes. You can select any theme for code editor. It will display when you edit any file. Also you can allow fullscreen mode of code editor. File Operations List: File doesn't exist to download. Files Backup Gray Help Here admin can give access to user roles to use filemanager. Admin can set Default Access Folder and also control upload size of filemanager. Info of file Invalid Security Code. Last Log Message Light Logs Make directory or folder Make file Maximum file upload size (upload_max_filesize) Memory Limit (memory_limit) Missing backup id. Missing parameter type. Missing required parameters. No Thanks No log message No logs found! Note: Note: These are demo screenshots. Please buy File Manager pro to Logs functions. Note: This is just a demo screenshot. To get settings please buy our pro version. OK Ok Others (Any other directories found inside wp-content) Others backup done on date  Others backup restored successfully. PHP version Parameters: Paste a file or folder Please Enter Email Address. Please Enter First Name. Please Enter Last Name. Please change this carefully, wrong path can lead file manager plugin to go down. Plugins Plugins backup done on date  Plugins backup restored successfully. Post maximum file upload size (post_max_size) Preferences Privacy Policy Public Root Path RESTORE FILES Remove or delete files and folders Rename a file or folder Restore SUCCESS Save Changes Saving... Search things Select All Settings Settings - Code-editor Settings - General Settings - User Restrictions Settings - User Role Restrictions Settings saved. Shortcode - PRO Simple cut a file or folder System Properties Terms of Service The backup apparently succeeded and is now complete. Themes Themes backup done on date  Themes backup restored successfully. Time now Timeout (max_execution_time) To make a archive or zip Today USE: Unable to removed backup! Unable to restore DB backup. Unable to restore others. Unable to restore plugins. Unable to restore themes. Unable to restore uploads. Upload Files Logs Upload files Uploads Uploads backup done on date  Uploads backup restored successfully. Verify View Log WP File Manager WP File Manager - Backup/Restore WP File Manager Contribution We love making new friends! Subscribe below and we promise to
    keep you up-to-date with our latest new plugins, updates,
    awesome deals and a few special offers. Welcome to File Manager You have not made any changes to be saved. Project-Id-Version: WP File Manager
Report-Msgid-Bugs-To: 
PO-Revision-Date: 2021-07-16 17:53+0530
Last-Translator: admin <munishthedeveloper48@gmail.com>
Language-Team: 
Language: ur
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Poedit 2.4.3
X-Poedit-KeywordsList: __;_e
X-Poedit-Basepath: ..
X-Poedit-SearchPath-0: .
 -> یہ خاص طور پر صارفین کو اپنے ایڈز کوما (،) کے ذریعہ تقسیم کرکے پابندی لگائے گا۔ اگر صارف پابندی ہے تو وہ سامنے کے آخر میں ڈبلیو پی پی فائل مینیجر تک رسائی حاصل نہیں کرسکیں گے۔ -> * تمام کارروائیوں کے ل some اور کچھ آپریشن کی اجازت دینے کے ل you آپ آپریشن نام کے جیسے ذکر کرسکتے ہیں ،allowed_operations="upload,download".نوٹ: کوما (،) کے ذریعہ جدا ہوا۔ پہلے سے طے شدہ: * -> فائل مینیجر تھیم۔ پہلے سے طے شدہ: Light -> فائل میں تبدیلی یا تاریخ کی شکل بنائیں۔ پہلے سے طے شدہ: d M، Y h:i A -> فائل منیجر کی زبان۔ پہلے سے طے شدہ: English(en) -> فائل مینجر UI دیکھیں۔ پہلے سے طے شدہ: grid -> یہاں "ٹیسٹ" فولڈر کا نام ہے جو روٹ ڈائرکٹری میں واقع ہے ، یا آپ سب فولڈروں کو "wp-content / plugins" کی طرح راہ دے سکتے ہیں۔ اگر خالی یا خالی چھوڑ دیں تو یہ روٹ ڈائرکٹری میں موجود تمام فولڈروں تک رسائی حاصل کرے گی۔ پہلے سے طے شدہ:Root directory -> اس سے تمام کرداروں کو فرنٹ اینڈ پر فائل مینیجر تک رسائی حاصل ہوسکے گی یا آپ خاص طور پر صارف کے کرداروں کے لئے آسان استعمال کرسکتے ہیں allowed_roles="editor,author" (کوما کے ذریعہ جدا جدا (،)) -> اس کو کوما میں تالا لگا دیا جائے گا۔ آپ جیسے ".pp، .css، .js" وغیرہ کو زیادہ سے زیادہ لاک کرسکتے ہیں ڈیفالٹ: Null -> فائلوں کی اجازت پڑھنے تک رسائی کے ل note ، نوٹ کریں: true/false, پہلے سے طے شدہ: true -> فائلوں کی اجازت لکھنے تک رسائی کے ل note ، نوٹ کریں: true/false, پہلے سے طے شدہ: false -> یہ یہاں ذکر چھپا دے گا. نوٹ: کوما (،) کے ذریعہ جدا ہوا۔ پہلے سے طے شدہ: Null <code>[wp_file_manager view="list" lang="en" theme="light" dateformat="d M, Y h:i A" allowed_roles="editor,author" access_folder="wp-content/plugins" write = "true" read = "false" hide_files = "kumar,abc.php" lock_extensions=".php,.css" allowed_operations="upload,download" ban_user_ids="2,3"] <code>[wp_file_manager]</code>-> یہ سامنے کے آخر میں فائل مینیجر کو دکھائے گا۔ لیکن صرف ایڈمنسٹریٹر اس تک رسائی حاصل کرسکتا ہے اور فائل مینیجر کی ترتیبات سے اس پر قابو پالیں گے۔ <code>[wp_file_manager_admin]</code>-> یہ سامنے کے آخر میں فائل مینیجر کو دکھائے گا۔ آپ فائل مینیجر کی ترتیبات سے تمام ترتیبات کو کنٹرول کرسکتے ہیں۔ یہ بیک اینڈ ڈبلیو پی فائل منیجر کی طرح کام کرے گا۔ <span class="fm_console_error">بیک اپ کامیابی کے ساتھ ہٹا دیا گیا!</span> <span class="fm_console_error">دوسروں کا بیک اپ ناکام ہوگیا۔</span> <span class="fm_console_error">پلگ ان کا بیک اپ ناکام ہوگیا۔</span> <span class="fm_console_error">سیکیورٹی کا مسئلہ.</span> <span class="fm_console_error">تھیمز کا بیک اپ ناکام ہوگیا۔</span> <span class="fm_console_error">ڈیٹا بیس کا بیک اپ بنانے سے قاصر۔</span> <span class="fm_console_error">اپ لوڈز کا بیک اپ ناکام ہوگیا۔</span> <span class="fm_console_success">سب ہوگیا</span> <span class="fm_console_success">ڈیٹا بیس کا بیک اپ ہوگیا۔</span> <span class="fm_console_success">دوسروں کا بیک اپ ہوگیا۔</span> <span class="fm_console_success">پلگ ان کا بیک اپ ہوگیا۔</span> <span class="fm_console_success">تھیمز کا بیک اپ مکمل ہوگیا۔</span> <span class="fm_console_success">اپ لوڈز کا بیک اپ ہوگیا۔</span> عمل منتخب کردہ بیک اپ پر کام ایڈمن کسی بھی صارف کے اقدامات کو محدود کرسکتا ہے۔ فائلوں اور فولڈروں کو بھی چھپائیں اور مختلف صارفین کے لئے مختلف - فولڈر کے مختلف راستے ترتیب دے سکتے ہیں۔ ایڈمن کسی بھی صارف کے عمل کو روک سکتا ہے۔ فائلوں اور فولڈروں کو بھی چھپائیں اور مختلف سیٹ کرسکتے ہیں - مختلف صارفین کے رول کے لئے مختلف فولڈر راہیں۔ کوڑے دان کو چالو کرنے کے بعد ، آپ کی فائلیں کوڑے دان کے فولڈر میں جائیں گی۔ اس کو چالو کرنے کے بعد تمام فائلیں میڈیا لائبریری میں جائیں گی۔ کیا آپ واقعی منتخب بیک اپ (زبانیں) ہٹانا چاہتے ہیں؟ کیا آپ واقعی یہ بیک اپ حذف کرنا چاہتے ہیں؟ کیا آپ واقعی یہ بیک اپ بحال کرنا چاہتے ہیں؟ بیک اپ / بحال کریں بیک اپ کی تاریخ ابھی بیک اپ بیک اپ کے اختیارات: بیک اپ ڈیٹا (ڈاؤن لوڈ کرنے کے لئے کلک کریں) بیک اپ فائلوں کے تحت ہوں گے بیک اپ چل رہا ہے ، براہ کرم انتظار کریں بیک اپ نہیں ملا! بیک اپ کامیابی کے ساتھ ہٹا دیا گیا! بیک اپ کامیابی کے ساتھ حذف ہوگیا۔ بیک اپ کامیابی کے ساتھ ہٹا دیئے گئے! پابندی لگانا براؤزر اور او ایس (HTTP_USER_AGENT) پی ار او خریدیں پرو خریدیں منسوخ کریں تھیم یہاں تبدیل کریں: کوڈ ایڈیٹر دیکھیں تصدیق کریں فائلیں یا فولڈرز کاپی کریں فی الحال کوئی بیک اپ نہیں ملا ہے۔ فائلیں حذف کریں گہرا ڈیٹا بیس کا بیک اپ ڈیٹا بیس کا بیک اپ تاریخ کو ہوا  ڈیٹا بیس کا بیک اپ کامیابی کے ساتھ بحال ہوا۔ پہلے سے طے شدہ پہلے سے طے شدہ: حذف کریں غیر منتخب کریں اس نوٹس کو مسترد کریں۔ عطیہ کریں فائلوں کا نوشتہ ڈاؤن لوڈ کریں فائلیں ڈاؤن لوڈ کریں کسی فولڈر یا فائل کو ڈپلیکیٹ یا کلون کریں فائلیں لاگ میں ترمیم کریں ایک فائل میں ترمیم کریں میڈیا لائبریری میں فائلیں اپ لوڈ کریں کو قابل بنائیں؟ کوڑے دان کو چالو کریں؟ موجودہ بیک اپ (زبانیں) آرکائیو یا زپ شدہ فائل کو نکالیں فائل منیجر - مختصر فائل منیجر۔ سسٹم کی خصوصیات فائل مینیجر روٹ راہ ، آپ اپنی پسند کے مطابق تبدیل کرسکتے ہیں۔ فائل مینیجر کے پاس ایک کوڈ ایڈیٹر ہے جس میں متعدد موضوعات ہیں۔ آپ کوڈ ایڈیٹر کے لئے کسی بھی تھیم کو منتخب کرسکتے ہیں۔ جب آپ کسی بھی فائل میں ترمیم کریں گے تو یہ ظاہر ہوگا۔ نیز آپ کوڈ ایڈیٹر کے پورے اسکرین وضع کی اجازت دے سکتے ہیں۔ فائل آپریشن کی فہرست: ڈاؤن لوڈ کرنے کے لئے فائل موجود نہیں ہے۔ فائلوں کا بیک اپ سرمئی مدد یہاں منتظم فائل مینجر کو استعمال کرنے کے لئے صارف کے کرداروں تک رسائی دے سکتا ہے۔ ایڈمن ڈیفالٹ ایکسیس فولڈر سیٹ کرسکتے ہیں اور فائل مینجر کے اپلوڈ سائز کو بھی کنٹرول کرسکتے ہیں۔ فائل کی معلومات غلط حفاظتی کوڈ۔ آخری لاگ پیغام ہلکا نوشتہ جات ڈائریکٹری یا فولڈر بنائیں فائل بنائیں زیادہ سے زیادہ فائل اپلوڈ سائز (upload_max_filesize) میموری کی حد (میموری_ لیمٹ) گمشدہ بیک اپ آئی ڈی پیرامیٹر کی قسم غائب ہے۔ لاپتہ مطلوبہ پیرامیٹرز۔ نہیں شکریہ کوئی لاگ پیغام نہیں ہے کوئی نوشتہ نہیں ملا! نوٹ: نوٹ: یہ ڈیمو اسکرین شاٹس ہیں۔ براہ کرم نوٹس افعال کے لئے فائل مینیجر کو خریدیں نوٹ: یہ صرف ایک ڈیمو اسکرین شاٹ ہے۔ ترتیبات حاصل کرنے کے لئے براہ کرم ہمارا حامی ورژن خریدیں۔ ٹھیک ہے ٹھیک ہے دوسرے (کسی بھی دوسری ڈائرکٹریوں میں WP- مشمولات کے اندر موجود) دوسروں کا بیک اپ تاریخ پر ہوا  دوسرے کا بیک اپ کامیابی کے ساتھ بحال ہوا۔ پی ایچ پی ورژن پیرامیٹرز: ایک فائل یا فولڈر چسپاں کریں برائے مہربانی ای میل ایڈریس درج کریں۔ براہ کرم پہلا نام درج کریں۔ براہ کرم آخری نام درج کریں براہ کرم اس کو احتیاط سے تبدیل کریں ، غلط راستہ فائل مینیجر پلگ ان کو نیچے جانے کی راہنمائی کرسکتا ہے۔ پلگ انز تاریخ میں پلگ ان کا بیک اپ ہوگیا  پلگ ان کا بیک اپ کامیابی کے ساتھ بحال ہوا۔ زیادہ سے زیادہ فائل اپ لوڈ سائز (post_max_size) پوسٹ کریں ترجیحات رازداری کی پالیسی عوامی جڑ کا راستہ فائلوں کو بحال کریں فائلیں اور فولڈرز کو حذف کریں یا حذف کریں ایک فائل یا فولڈر کا نام تبدیل کریں بحال کریں کامیابی تبدیلیاں محفوظ کرو بچت… چیزیں تلاش کریں تمام منتخب کریں ترتیبات ترتیبات - کوڈ ایڈیٹر ترتیبات - عام ترتیبات - صارف کی پابندیاں ترتیبات - صارف کے کردار پر پابندیاں ترتیبات محفوظ ہوگئیں۔ مختصر - پی ار او سادہ فائل یا فولڈر کٹ سسٹم پراپرٹیز سروس کی شرائط بیک اپ بظاہر کامیاب ہوگیا اور اب مکمل ہے۔ موضوعات تھیمز کا بیک اپ تاریخ پر ہوا  تھیمز کا بیک اپ کامیابی کے ساتھ بحال ہوا۔ اب وقت ہوا ہے ٹائم آؤٹ(max_execution_time) آرکائیو یا زپ بنانے کے ل آج استعمال: بیک اپ کو ہٹانے سے قاصر! DB بیک اپ کو بحال کرنے سے قاصر۔ دوسروں کو بحال کرنے سے قاصر۔ پلگ ان کو بحال کرنے سے قاصر۔ تھیمز کو بحال کرنے سے قاصر۔ اپ لوڈز کو بحال کرنے سے قاصر۔ فائلوں کے لاگز اپ لوڈ کریں فائلیں اپ لوڈ کرو اپ لوڈز تاریخ کو اپ لوڈ بیک اپ ہوگیا  اپ لوڈز کا بیک اپ کامیابی کے ساتھ بحال ہوا۔ تصدیق کریں لاگ دیکھیں WP فائل منیجر WP فائل منیجر - بیک اپ / بحال کریں WP فائل مینیجر کی شراکت ہمیں نئے دوست بنانا پسند ہے! ذیل میں سبسکرائب کریں اور ہم وعدہ کرتے ہیں
    ہمارے حالیہ نئے پلگ ان ، تازہ کاریوں ،
    زبردست سودے اور کچھ خصوصی پیش کشیں۔ فائل مینیجر میں خوش آمدید آپ نے بچانے کیلئے کوئی تبدیلیاں نہیں کی ہیں۔ 