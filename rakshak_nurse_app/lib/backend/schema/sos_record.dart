import 'dart:async';

import 'package:collection/collection.dart';

import '/backend/schema/util/firestore_util.dart';
import '/backend/schema/util/schema_util.dart';

import 'index.dart';
import '/flutter_flow/flutter_flow_util.dart';

class SosRecord extends FirestoreRecord {
  SosRecord._(
    DocumentReference reference,
    Map<String, dynamic> data,
  ) : super(reference, data) {
    _initializeFields();
  }

  // "coordinates" field.
  LatLng? _coordinates;
  LatLng? get coordinates => _coordinates;
  bool hasCoordinates() => _coordinates != null;

  // "phoneNumber" field.
  String? _phoneNumber;
  String get phoneNumber => _phoneNumber ?? '';
  bool hasPhoneNumber() => _phoneNumber != null;

  // "name" field.
  String? _name;
  String get name => _name ?? '';
  bool hasName() => _name != null;

  // "uid" field.
  String? _uid;
  String get uid => _uid ?? '';
  bool hasUid() => _uid != null;

  // "criticalCondition" field.
  bool? _criticalCondition;
  bool get criticalCondition => _criticalCondition ?? false;
  bool hasCriticalCondition() => _criticalCondition != null;

  // "time" field.
  DateTime? _time;
  DateTime? get time => _time;
  bool hasTime() => _time != null;

  // "status" field.
  bool? _status;
  bool get status => _status ?? false;
  bool hasStatus() => _status != null;

  void _initializeFields() {
    _coordinates = snapshotData['coordinates'] as LatLng?;
    _phoneNumber = snapshotData['phoneNumber'] as String?;
    _name = snapshotData['name'] as String?;
    _uid = snapshotData['uid'] as String?;
    _criticalCondition = snapshotData['criticalCondition'] as bool?;
    _time = snapshotData['time'] as DateTime?;
    _status = snapshotData['status'] as bool?;
  }

  static CollectionReference get collection =>
      FirebaseFirestore.instance.collection('SOS');

  static Stream<SosRecord> getDocument(DocumentReference ref) =>
      ref.snapshots().map((s) => SosRecord.fromSnapshot(s));

  static Future<SosRecord> getDocumentOnce(DocumentReference ref) =>
      ref.get().then((s) => SosRecord.fromSnapshot(s));

  static SosRecord fromSnapshot(DocumentSnapshot snapshot) => SosRecord._(
        snapshot.reference,
        mapFromFirestore(snapshot.data() as Map<String, dynamic>),
      );

  static SosRecord getDocumentFromData(
    Map<String, dynamic> data,
    DocumentReference reference,
  ) =>
      SosRecord._(reference, mapFromFirestore(data));

  @override
  String toString() =>
      'SosRecord(reference: ${reference.path}, data: $snapshotData)';

  @override
  int get hashCode => reference.path.hashCode;

  @override
  bool operator ==(other) =>
      other is SosRecord &&
      reference.path.hashCode == other.reference.path.hashCode;
}

Map<String, dynamic> createSosRecordData({
  LatLng? coordinates,
  String? phoneNumber,
  String? name,
  String? uid,
  bool? criticalCondition,
  DateTime? time,
  bool? status,
}) {
  final firestoreData = mapToFirestore(
    <String, dynamic>{
      'coordinates': coordinates,
      'phoneNumber': phoneNumber,
      'name': name,
      'uid': uid,
      'criticalCondition': criticalCondition,
      'time': time,
      'status': status,
    }.withoutNulls,
  );

  return firestoreData;
}

class SosRecordDocumentEquality implements Equality<SosRecord> {
  const SosRecordDocumentEquality();

  @override
  bool equals(SosRecord? e1, SosRecord? e2) {
    return e1?.coordinates == e2?.coordinates &&
        e1?.phoneNumber == e2?.phoneNumber &&
        e1?.name == e2?.name &&
        e1?.uid == e2?.uid &&
        e1?.criticalCondition == e2?.criticalCondition &&
        e1?.time == e2?.time &&
        e1?.status == e2?.status;
  }

  @override
  int hash(SosRecord? e) => const ListEquality().hash([
        e?.coordinates,
        e?.phoneNumber,
        e?.name,
        e?.uid,
        e?.criticalCondition,
        e?.time,
        e?.status
      ]);

  @override
  bool isValidKey(Object? o) => o is SosRecord;
}
