                  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Transaksi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <?php
                                   $query = $konek->query("SELECT t.id_pelanggan,p.nama_pelanggan,t.status,t.total FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan ");
                                  ?>
                                  
                                  <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Namax</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($konek, "SELECT * FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan WHERE t.id_pelanggan='1' ");
                    while ($da = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $da['nama_pelanggan']?></td>
                            <td><?= $da['status'] ?></td>
                            <td>Rp <?= number_format($da['total']) ?></td>
                            <td><a href="bukti_bayar.php?id=<?= $da['id_transaksi']; ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>

            </table>
                                </div>
                            </div>
                        </div>
