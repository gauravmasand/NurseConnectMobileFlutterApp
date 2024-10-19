import 'dart:convert';
import 'dart:math' as math;

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:intl/intl.dart';
import 'package:timeago/timeago.dart' as timeago;
import 'lat_lng.dart';
import 'place.dart';
import 'uploaded_file.dart';
import '/backend/backend.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import '/auth/firebase_auth/auth_util.dart';

String getDistance(
  LatLng userLatLang,
  LatLng nurseLatLang,
) {
  const earthRadius = 6371000; // Earth's radius in meters

  // Calculate differences
  final latDiff = (nurseLatLang.latitude - userLatLang.latitude) *
      math.pi /
      180; // Convert degrees to radians
  final lonDiff = (nurseLatLang.longitude - userLatLang.longitude) *
      math.pi /
      180; // Convert degrees to radians

  // Convert latitudes to radians
  final userLatRadians = userLatLang.latitude * math.pi / 180;
  final nurseLatRadians = nurseLatLang.latitude * math.pi / 180;

  // Haversine formula
  final a = math.sin(latDiff / 2) * math.sin(latDiff / 2) +
      math.cos(userLatRadians) *
          math.cos(nurseLatRadians) *
          math.sin(lonDiff / 2) *
          math.sin(lonDiff / 2);
  final c = 2 * math.atan2(math.sqrt(a), math.sqrt(1 - a));
  final distanceMeters = earthRadius * c;

  // Return the distance as "100 m" or "1.2 km"
  if (distanceMeters < 1000) {
    return "${distanceMeters.toStringAsFixed(0)} m";
  } else {
    return "${(distanceMeters / 1000).toStringAsFixed(1)} km";
  }
}
