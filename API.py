from flask import Flask
from flask_restful import Resource, Api, reqparse
from sqlalchemy import create_engine

e = create_engine('mysql://kuncir:terserah@10.151.36.5/kuncir')  # membuat koneksi ke db kuncir

app = Flask(__name__)
api = Api(app)
parser = reqparse.RequestParser()  # membuat variable request parser untuk method POST dan GET
parser.add_argument('picture')
parser.add_argument('waktu_pinjam')
parser.add_argument('peminjam_terdaftar_NRP')
parser.add_argument('waktu_kembali')


class nrp_mahasiswa(Resource):  # Class nrp_mahasiswa untuk mengecek apakah nrp mahasiswa terdaftar
    def get(self, nrp):
        conn = e.connect()
        query = conn.execute("select * from peminjam_terdaftar_v3 where NRP='%s'" % nrp)
        result = {'data': [dict(zip(tuple(query.keys()), i)) for i in query.cursor]}
        print result
        if result['data']:
            return {'status': 'success'}
        else:
            return {'status': 'failed'}


class pin_mahasiswa(Resource):  # Class pin_mahasiswa untuk mengecek apakah pin dari mahasiswa tersebut benar
    def get(self, nrp, pin):
        conn = e.connect()
        query = conn.execute("select * from peminjam_terdaftar_v3 where NRP='%s' and PIN='%s'" % (nrp, pin))
        result = {'data': [dict(zip(tuple(query.keys()), i)) for i in query.cursor]}
        print result
        if result['data']:
            return {'status': 'success'}
        else:
            return {'status': 'failed'}


class peminjam(Resource):  # Class peminjam menambahkan query waktu peminjam, nrp, dan hasil foto kedalam db
    def post(self):
        conn = e.connect()
        args = parser.parse_args()
        # print args['peminjam_terdaftar_NRP']
        query = conn.execute(
            "insert into peminjam_v3 (waktu_pinjam, peminjam_terdaftar_NRP, picture) values ('%s', '%s', 'data:image/jpeg;base64,%s')" % (
            args['waktu_pinjam'], args['peminjam_terdaftar_NRP'], args['picture']))
        # print args


class pengembalian(Resource):  # Class pengembalian untuk mencatat waktu kembali kuncir
    def put(self):
        conn = e.connect()
        args = parser.parse_args()
        # query = conn.execute("insert into peminjam_v3 (waktu_pinjam, peminjam_terdaftar_NRP, picture) values ('%s', '%s', '%s')" % (args['waktu_pinjam'],args['peminjam_terdaftar_NRP'],args['picture']))
        query = conn.execute(
            "UPDATE peminjam_v3 SET waktu_kembali = '%s' WHERE idpeminjam = (SELECT MAX(idpeminjam) FROM (SELECT * FROM peminjam_v3) AS lonte)" % (
            args['waktu_kembali']))


# menambah resource dengan generate link
api.add_resource(peminjam, '/kuncir/login')
api.add_resource(nrp_mahasiswa, '/kuncir/<string:nrp>')
api.add_resource(pin_mahasiswa, '/kuncir/<string:nrp>/<string:pin>')
api.add_resource(pengembalian, '/kuncir/logout')
if __name__ == '__main__':
    app.run(host='0.0.0.0', port='8000')
