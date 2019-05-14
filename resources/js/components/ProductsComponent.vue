<template>

	<div>

		<div class="row">

			<div class="col-md-12 form-group">

				<a class="btn btn-success pull-right" data-target="#addProductForm" data-toggle="modal" href="#">
					<i aria-hidden="true" class="fa fa-plus"></i>&nbsp;Add Product
				</a>

			</div>

		</div>

		<div class="card">
			<div class="card-header">
				<i aria-hidden="true" class="fa fa-cart-plus"></i> Products
			</div>

			<div class="card-body">

				<div class="table-responsive">

					<table class="table table-striped">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th>Active</th>
							<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						<tr v-for="product of products">
							<td>{{ product.id }}</td>
							<td>
								<i aria-hidden="true" class="fa fa-thumbs-up" v-if="product.active === 1"></i>
								<i aria-hidden="true" class="fa fa-thumbs-down" v-else></i>
							</td>
							<td>{{ product.name }}</td>
							<td>{{ product.description }}</td>
							<td>{{ product.price }}</td>
							<td class="actions">

								<a @click="show(product.id, $event)" class="btn btn-success" data-target="#productShow" data-toggle="modal" href="#">
									<i aria-hidden="true" class="fa fa-eye"></i>
								</a>

								<a @click="showUpdate(product, $event)" class="btn btn-primary" data-target="#editProductForm" data-toggle="modal" href="#">
									<i aria-hidden="true" class="fa fa-pencil"></i>
								</a>

								<a @click="destroy(product.id, $event)" class="btn btn-danger" href="#">
									<i aria-hidden="true" class="fa fa-trash"></i>
								</a>

							</td>
						</tr>
						</tbody>
					</table>

				</div>

			</div>
		</div>

		<!-- Modal Product Show -->
		<div aria-hidden="true" aria-labelledby="modelTitleId" class="modal fade" id="productShow" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{ product.name }}</h5>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h1>Product Info</h1>

						<p>
							<strong>Name:</strong> {{ product.name }}
						</p>

						<p>
							<strong>Active:</strong> <i aria-hidden="true" class="fa fa-thumbs-up" v-if="product.active === 1"></i>
							<i aria-hidden="true" class="fa fa-thumbs-down" v-else></i>
						</p>

						<p>
							<strong>Description:</strong> {{ product.description }}
						</p>

						<p>
							<strong>Price:</strong> {{ product.price }}
						</p>

					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Add Product Modal -->
		<div aria-hidden="true" aria-labelledby="modelTitleId" class="modal fade" id="addProductForm" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form @submit="create($event)" action="#" class="addProductForm" method="post">

						<div class="modal-header">
							<h5 class="modal-title">
								<i aria-hidden="true" class="fa fa-plus"></i>&nbsp;Add Product
							</h5>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" id="add_product_active" name="active" type="checkbox" value="1">
									Active
								</label>
							</div>

							<div class="form-group">
								<label for="add_product_name"></label>
								<input class="form-control" id="add_product_name" name="name" placeholder="Product Name..." type="text">
							</div>

							<div class="form-group">
								<label for="add_product_description"></label>
								<textarea class="form-control" id="add_product_description" name="description" placeholder="Product Description..." rows="3"></textarea>
							</div>

							<div class="form-group">
								<label for="add_product_price"></label>
								<input class="form-control" id="add_product_price" name="name" placeholder="Product Price..." type="text">
							</div>

						</div>

						<div class="modal-footer">
							<button class="btn btn-secondary btn-close" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" type="submit">Create</button>
						</div>

					</form>

				</div>
			</div>
		</div>

		<!-- Edit Product Modal -->
		<div aria-hidden="true" aria-labelledby="modelTitleId" class="modal fade" id="editProductForm" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form @submit="update($event)" action="#" class="editProductForm" method="post">

						<input id="editID" name="id" type="hidden" value="">

						<div class="modal-header">
							<h5 class="modal-title">
								<i aria-hidden="true" class="fa fa-plus"></i>&nbsp;Edit Product
							</h5>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" id="edit_product_active" name="active" type="checkbox" value="1">
									Active
								</label>
							</div>

							<div class="form-group">
								<label for="edit_product_name"></label>
								<input class="form-control" id="edit_product_name" name="name" placeholder="Product Name..." type="text">
							</div>

							<div class="form-group">
								<label for="edit_product_description"></label>
								<textarea class="form-control" id="edit_product_description" name="description" placeholder="Product Description..." rows="3"></textarea>
							</div>

							<div class="form-group">
								<label for="edit_product_price"></label>
								<input class="form-control" id="edit_product_price" name="name" placeholder="Product Price..." type="text">
							</div>

						</div>

						<div class="modal-footer">
							<button class="btn btn-secondary btn-close2" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" type="submit">Save</button>
						</div>

					</form>

				</div>
			</div>
		</div>

	</div>

</template>

<script>

    import axios from 'axios';

    var api_token = null;

    if (document.getElementsByName('api_token').length) {
        api_token = 'Bearer '.concat(document.getElementsByName('api_token')[0].content);
    }

    window.axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Authorization': api_token
    };

    export default {
        name: "ProductsComponent",

        data() {
            return {
                product: [],
                products: [],
                errors: []
            }
        },
        methods: {
            index() {
                if (api_token.length) {
                    axios.get('api/products')
                        .then(res => {
                            this.products = res.data;
                        })
                        .catch(e => {
                            console.log(e);
                        });
                }
            },
            show(id, event) {
                event.preventDefault();

                axios.get('api/products/' + id)
                    .then(res => {
                        this.product = res.data;

                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            create(event) {
                event.preventDefault();

                const _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const product_active = document.getElementById('add_product_active').checked;
                const product_name = document.getElementById('add_product_name').value;
                const product_description = document.getElementById('add_product_description').value;
                const product_price = document.getElementById('add_product_price').value;

                axios.post('api/products', {
                    _token: _token,
                    active: product_active,
                    name: product_name,
                    description: product_description,
                    price: product_price
                })
                    .then(res => {
                        document.getElementById('add_product_name').value = '';
                        document.getElementById('add_product_description').value = '';
                        document.getElementById('add_product_price').value = '';
                        this.index();
                        document.getElementsByClassName('btn-close')[0].click();
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            showUpdate(product, event) {
                event.preventDefault();

                document.getElementById('editID').value = product.id;
                document.getElementById('edit_product_active').value = product.active;
                document.getElementById('edit_product_name').value = product.name;
                document.getElementById('edit_product_description').value = product.description;
                document.getElementById('edit_product_price').value = product.price;

                if (product.active) {
                    document.getElementById('edit_product_active').checked = true;
                } else {
                    document.getElementById('edit_product_active').checked = false;
                }
            },
            update(event) {
                event.preventDefault();

                const _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const product_id = document.getElementById('editID').value;
                const product_active = document.getElementById('edit_product_active').checked;
                const product_name = document.getElementById('edit_product_name').value;
                const product_description = document.getElementById('edit_product_description').value;
                const product_price = document.getElementById('edit_product_price').value;

                axios.put('api/products/' + product_id, {
                    _token: _token,
                    id: product_id,
                    active: product_active,
                    name: product_name,
                    description: product_description,
                    price: product_price
                })
                    .then(res => {
                        document.getElementById('edit_product_name').value = '';
                        document.getElementById('edit_product_description').value = '';
                        document.getElementById('edit_product_price').value = '';
                        this.index();
                        document.getElementsByClassName('btn-close2')[0].click();
                    })
                    .catch(e => {
                        console.log(e);
                    });

            },
            destroy(id, event) {
                event.preventDefault();

                axios.delete('api/products/' + id)
                    .then(res => {
                        alert('Product has been deleted.')
                    })
                    .catch(e => {
                        console.log(e);
                    });

                this.index();
            }
        },
        beforeMount() {
            this.index()
        }
    }
</script>