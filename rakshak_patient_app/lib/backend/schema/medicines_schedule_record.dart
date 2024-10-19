import 'dart:async';

import 'package:collection/collection.dart';

import '/backend/schema/util/firestore_util.dart';
import '/backend/schema/util/schema_util.dart';

import 'index.dart';
import '/flutter_flow/flutter_flow_util.dart';

class MedicinesScheduleRecord extends FirestoreRecord {
  MedicinesScheduleRecord._(
    DocumentReference reference,
    Map<String, dynamic> data,
  ) : super(reference, data) {
    _initializeFields();
  }

  // "medicines" field.
  List<String>? _medicines;
  List<String> get medicines => _medicines ?? const [];
  bool hasMedicines() => _medicines != null;

  // "status" field.
  List<bool>? _status;
  List<bool> get status => _status ?? const [];
  bool hasStatus() => _status != null;

  // "m" field.
  String? _m;
  String get m => _m ?? '';
  bool hasM() => _m != null;

  // "mS" field.
  bool? _mS;
  bool get mS => _mS ?? false;
  bool hasMS() => _mS != null;

  // "a" field.
  String? _a;
  String get a => _a ?? '';
  bool hasA() => _a != null;

  // "aS" field.
  bool? _aS;
  bool get aS => _aS ?? false;
  bool hasAS() => _aS != null;

  // "n" field.
  String? _n;
  String get n => _n ?? '';
  bool hasN() => _n != null;

  // "nS" field.
  bool? _nS;
  bool get nS => _nS ?? false;
  bool hasNS() => _nS != null;

  void _initializeFields() {
    _medicines = getDataList(snapshotData['medicines']);
    _status = getDataList(snapshotData['status']);
    _m = snapshotData['m'] as String?;
    _mS = snapshotData['mS'] as bool?;
    _a = snapshotData['a'] as String?;
    _aS = snapshotData['aS'] as bool?;
    _n = snapshotData['n'] as String?;
    _nS = snapshotData['nS'] as bool?;
  }

  static CollectionReference get collection =>
      FirebaseFirestore.instance.collection('medicinesSchedule');

  static Stream<MedicinesScheduleRecord> getDocument(DocumentReference ref) =>
      ref.snapshots().map((s) => MedicinesScheduleRecord.fromSnapshot(s));

  static Future<MedicinesScheduleRecord> getDocumentOnce(
          DocumentReference ref) =>
      ref.get().then((s) => MedicinesScheduleRecord.fromSnapshot(s));

  static MedicinesScheduleRecord fromSnapshot(DocumentSnapshot snapshot) =>
      MedicinesScheduleRecord._(
        snapshot.reference,
        mapFromFirestore(snapshot.data() as Map<String, dynamic>),
      );

  static MedicinesScheduleRecord getDocumentFromData(
    Map<String, dynamic> data,
    DocumentReference reference,
  ) =>
      MedicinesScheduleRecord._(reference, mapFromFirestore(data));

  @override
  String toString() =>
      'MedicinesScheduleRecord(reference: ${reference.path}, data: $snapshotData)';

  @override
  int get hashCode => reference.path.hashCode;

  @override
  bool operator ==(other) =>
      other is MedicinesScheduleRecord &&
      reference.path.hashCode == other.reference.path.hashCode;
}

Map<String, dynamic> createMedicinesScheduleRecordData({
  String? m,
  bool? mS,
  String? a,
  bool? aS,
  String? n,
  bool? nS,
}) {
  final firestoreData = mapToFirestore(
    <String, dynamic>{
      'm': m,
      'mS': mS,
      'a': a,
      'aS': aS,
      'n': n,
      'nS': nS,
    }.withoutNulls,
  );

  return firestoreData;
}

class MedicinesScheduleRecordDocumentEquality
    implements Equality<MedicinesScheduleRecord> {
  const MedicinesScheduleRecordDocumentEquality();

  @override
  bool equals(MedicinesScheduleRecord? e1, MedicinesScheduleRecord? e2) {
    const listEquality = ListEquality();
    return listEquality.equals(e1?.medicines, e2?.medicines) &&
        listEquality.equals(e1?.status, e2?.status) &&
        e1?.m == e2?.m &&
        e1?.mS == e2?.mS &&
        e1?.a == e2?.a &&
        e1?.aS == e2?.aS &&
        e1?.n == e2?.n &&
        e1?.nS == e2?.nS;
  }

  @override
  int hash(MedicinesScheduleRecord? e) => const ListEquality()
      .hash([e?.medicines, e?.status, e?.m, e?.mS, e?.a, e?.aS, e?.n, e?.nS]);

  @override
  bool isValidKey(Object? o) => o is MedicinesScheduleRecord;
}
