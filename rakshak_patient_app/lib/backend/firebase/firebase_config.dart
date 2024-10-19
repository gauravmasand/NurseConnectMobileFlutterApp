import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/foundation.dart';

Future initFirebase() async {
  if (kIsWeb) {
    await Firebase.initializeApp(
        options: FirebaseOptions(
            apiKey: "AIzaSyAKIGyAVnVDDY6HSCnKpP-xOVG4rOqnrfA",
            authDomain: "kakshak-ccezkm.firebaseapp.com",
            projectId: "kakshak-ccezkm",
            storageBucket: "kakshak-ccezkm.appspot.com",
            messagingSenderId: "477151675027",
            appId: "1:477151675027:web:e97b8de0eaacb684b5c366"));
  } else {
    await Firebase.initializeApp();
  }
}
