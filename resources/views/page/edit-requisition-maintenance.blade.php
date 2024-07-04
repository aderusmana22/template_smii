<x-app-layout>
    @section('title')
        Edit {{ $editRqm->rqmNbr }}
    @endsection
    <div class="content-header">
        <div class="flex items-center justify-between">

            <h4 class="page-title text-2xl font-medium">Edit Requisition Maintenance - {{ $editRqm->rqmNbr }}</h4>
            <div class="inline-flex items-center">
                <nav>
                    <ol class="breadcrumb flex items-center">
                        <li class="breadcrumb-item pr-1"><a href="{{ route('dashboard') }}"><i
                                    class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item pr-1" aria-current="page"> Requsition</li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Requsition Maintenance</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <!-- Step wizard -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form id="form" name="form" method="POST"
                    action="{{ route('rqm.update', ['rqmNbr' => $editRqm->rqmNbr]) }}"
                    class="validation-wizard wizard-circle">
                    @csrf
                    <!-- Step 1 -->
                    <h6>PR Information</h6>
                    <section>
                        <div class="grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-x-4">
                            <div class="mb-1">
                                @csrf
                                <label for="prNumber" class="block mb-2 text-md font-medium">Req Number: <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="prNumberInput" name="prNumber" readonly
                                    value="{{ $editRqm->rqmNbr }}"
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Tekan Enter untuk mendapatkan Nomor PR">
                            </div>

                            <div class="form-group relative mb-1">
                                <label for="supplier" class="block mb-2 text-md font-medium">Supplier:</label>
                                <div class="relative">
                                    <input type="text" name="rqmVend" value="{{ $editRqm->rqmVend }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 pr-10 p-2.5"
                                        id="supplier">
                                    <a data-modal-target="large-modal" data-modal-toggle="large-modal"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                        <i class="fa fa-search text-gray-500 text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="site" class="block mb-2 text-md font-medium ">Users:</label>
                                <input type="text" value="{{ Auth::user()->name }}" name="enterby"
                                    value="{{ $editRqm->enterby }}"
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    id="site" readonly>
                            </div>
                            <div class="mb-1">
                                <input type="hidden" value="1000" id="site" name="rqmSite"
                                    value="{{ $editRqm->rqmSite }}">
                            </div>
                            <div class="mb-1">
                                <input type="hidden" value="1000" id="site" name="rqmShip"
                                    value="{{ $editRqm->rqmShip }}">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-x-4">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-1">
                                    <label for="requestdate" class="block mb-2 text-sm font-medium">Request
                                        Date: <span class="text-danger">*</span></label>
                                    <input type="date" id="requestdate" value="{{ $editRqm->rqmReqDate }}"
                                        name="rqmReqDate" readonly required
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">
                                </div>
                                <div class="mb-1">
                                    <label for="needdate" class="block mb-2 text-sm font-medium">Need Date: <span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="needdate" value="{{ $editRqm->rqmNeedDate }}"
                                        name="rqmNeedDate"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">
                                </div>
                                <div class="mb-1">
                                    <label for="duedate" class="block mb-2 text-sm font-medium">Due Date: <span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="duedate" value="{{ $editRqm->rqmDueDate }}"
                                        name="rqmDueDate"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">
                                </div>
                                <div class="mb-1">
                                    <input type="hidden" id="enterby" value="mfg" name="rqmRqbyUserid"
                                        value="{{ $editRqm->rqmRqbyUserid }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                </div>
                                <div class="mb-1">
                                    <input type="hidden" id="requestby" name='requestby' value="mfg"
                                        value="{{ $editRqm->rqmRqbyUserid }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div class="form-group relative mb-1">
                                    <label for="costcenter" class="block mb-2 text-sm font-medium">Cost
                                        Center: <span class="text-danger">*</span></label>
                                    <div class="relative">
                                        <input type="text" name="rqmCc" value="{{ $editRqm->rqmCc }}"
                                            class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 pr-10 p-2.5 "
                                            id="costcenter">
                                        <a data-modal-target="large-modal-cost" data-modal-toggle="large-modal-cost"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                            <i class="fa fa-search text-gray-500 text-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group relative mb-1">
                                    <label for="enduser" class="block mb-2 text-md font-medium">End User: <span
                                            class="text-danger">*</span></label>
                                    <div class="relative">
                                        <input type="text" name="rqmEndUserid"
                                            class="bg-gray-200 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 pr-10 p-2.5 "
                                            id="enduser" value="{{ $editRqm->rqmEndUserid }}">
                                        <a data-modal-target="large-modal-enduser"
                                            data-modal-toggle="large-modal-enduser"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                            <i class="fa fa-search text-gray-500 text-2xl"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-1">
                                    <label for="reason" class="block mb-2 text-sm font-medium">Reason:</label>
                                    <input type="text" id="reason" name="rqmReason"
                                        value="{{ $editRqm->rqmReason }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div class="mb-1">
                                    <label for="remarks" class="block mb-2 text-sm font-medium">Remarks:</label>
                                    <input type="text" id="remarks" name="rqmRmks"
                                        value="{{ $editRqm->rqmRmks }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>

                                <div class="mb-1">
                                    <label for="currency" class="block mb-2 text-md font-medium">Currency: <span
                                            class="text-danger">*</span></label>
                                    <select id="currency" name="rqmCurr"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">
                                        @foreach ($currency as $curr)
                                            <option value="{{ $curr->code }}">{{ $curr->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="messageContainer" class="mt-2"></div>
                                <div class="mb-1">
                                    <input type="hidden" value="US" id="lang" name="rqmLang"
                                        value="{{ $editRqm->rqmLang }}">
                                </div>

                                <div class="mb-1">
                                    <input type="hidden" value="R" id="emailOption" name="emailOptEntry"
                                        value="{{ $editRqm->emailOptEntry }}">
                                </div>
                                <div class="mb-1">
                                    <input type="hidden" id="entity" value="SMII" name="rqmEntity"
                                        value="{{ $editRqm->rqmEntity }}">
                                </div>

                                <div class="mb-1">
                                    <label for="appstatus" class="block mb-2 text-sm font-medium">Approval
                                        Status:</label>
                                    <input type="text" id="appstatus" name="rqmAprvStat"
                                        value="{{ $editRqm->rqmAprvStat }}"
                                        class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        readonly>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <input type="checkbox" id="directCheckbox" class="rounded" name="rqmDirect"
                                        @checked($editRqm->rqmDirect == 'true')>
                                    <label for="directCheckbox" class="text-sm font-medium ml-2 text-black">Direct
                                        Material</label>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <input type="checkbox" id="nonPOCheckbox" class="rounded" name="rqm__log01"
                                        @checked($editRqm->rqm__log01 == 'true')>
                                    <label for="nonPOCheckbox" class="text-sm font-medium ml-2 text-black">PR Non
                                        PO</label>
                                </div>
                            </div>
                    </section>
                    <!-- Step 2 -->
                    <h6 class="text-sm font-semibold mb-4">Product Detail</h6>
                    <section>
                        <div id="lineItemsContainer">
                            @foreach ($editRqm->rqdDets as $rqdDet)
                                <div class="text-md p-5 font-bold">Line {{ $loop->iteration }}</div>
                                <div class="lineItem" data-row-id="row-{{ $loop->iteration }}">

                                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 ">
                                        <div class="form-group relative mb-1">
                                            <label for="itemnumber" class="block text-sm font-medium">Item
                                                Number: <span class="text-danger">*</span></label>
                                            <div class="relative">
                                                <input type="text" id="itemnumber-{{ $loop->iteration }}"
                                                    name="rqdPart[]"
                                                    class="itemnumber bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 itemnumber required"
                                                    value="{{ $rqdDet->rqdPart }}">
                                                <a data-modal-target="modal-item"
                                                    class="modal-trigger absolute inset-y-0 right-0 flex items-center pr-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                                    <i class="fa fa-search text-gray-500 text-2xl"></i>
                                                </a>
                                            </div>
                                            <input type="hidden" class="rqdDesc"
                                                id="rqdDesc-{{ $loop->iteration }}" name="rqdDesc[]"
                                                value="{{ $rqdDet->rqdDesc }}">
                                            <input type="hidden" class="rqdId" id="rqdId-{{ $loop->iteration }}"
                                                name="rqdId[]" value="{{ $rqdDet->id }}">
                                            <input type="hidden" class="rqdLine"
                                                id="rqdLine-{{ $loop->iteration }}" name="rqdLine[]"
                                                value="{{ $rqdDet->rqdLine }}">
                                        </div>
                                        <div class="form-group relative mb-1">
                                            <label for="supplieritem"
                                                class="block text-sm font-medium">Supplier:</label>
                                            <div class="relative">
                                                <input type="text" id="supplieritem-{{ $loop->iteration }}"
                                                    name="rqdVend[]"
                                                    class="supplieritem bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                    value="{{ $rqdDet->rqdVend }}">
                                                <a data-modal-target="modal-supplieritem"
                                                    class="
                                                        modal-trigger absolute inset-y-0 right-0 flex items-center pr-3
                                                        top-1/2 transform -translate-y-1/2 cursor-pointer">
                                                    <i class="fa fa-search text-gray-500 text-2xl"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reqQty" class="block text-sm font-medium">Req Qty: <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="reqQty-{{ $loop->iteration }}"
                                                name="rqdReqQty[]" value="{{ $rqdDet->rqdReqQty }}" placeholder="0"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 reqQty required">
                                        </div>
                                        <div class="form-group">
                                            <label for="um" class="block text-sm font-medium">UM:</label>
                                            <input type="text" id="rqdUm-{{ $loop->iteration }}" name="rqdUm[]"
                                                readonly value="{{ $rqdDet->rqdUm }}"
                                                class="rqdUm bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>
                                        <div class="form-group">
                                            <label for="unitCost" class="block text-sm font-medium">Unit Cost: <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="unitCost-{{ $loop->iteration }}"
                                                name="rqdPurCost[]" value="{{ $rqdDet->rqdPurCost }}"
                                                placeholder="0"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 unitCost required">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="rqdDiscPct-{{ $loop->iteration }}"
                                                value="{{ $rqdDet->rqdDiscPct }}" name="rqdDiscPct[]"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-4 mt-6 ">
                                        <div class="form-group relative mb-1">
                                            <label for="dueDate" class="block text-sm font-medium">Due Date: <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="dueDate-{{ $loop->iteration }}"
                                                name="rqdDueDate[]" value="{{ $rqdDet->rqdDueDate }}"
                                                class="rqdDueDate bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">

                                            <label for="needDate" class="block text-sm font-medium mt-4">Need
                                                Date: <span class="text-danger">*</span></label>
                                            <input type="date" id="needDate-{{ $loop->iteration }}"
                                                name="rqdNeedDate[]" value="{{ $rqdDet->rqdNeedDate }}"
                                                class="rqdNeedDate bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">

                                            <div class="form-group relative mb-1">
                                                <label for="purracct" class="block text-sm font-medium">Purr
                                                    Acct: <span class="text-danger">*</span></label>
                                                <div class="relative">
                                                    <input type="text" id="purracct-{{ $loop->iteration }}"
                                                        name="rqdAcct[]" value="{{ $rqdDet->rqdAcct }}"
                                                        class="purracct bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 required">
                                                    <a data-modal-target="modal-purracct"
                                                        class="modal-trigger absolute inset-y-0 right-0 flex items-center pr-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                                        <i class="fa fa-search text-gray-500 text-2xl"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group relative mb-1">
                                            <label for="stockUMQty" class="block text-sm font-medium">Stock UM
                                                Qty:</label>
                                            <input type="number" id="stockUMQty-{{ $loop->iteration }}"
                                                value="{{ $rqdDet->rqdUmConv }}" name="rqdUmConv[]" readonly
                                                class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 stockUMQty">
                                            <label for="maxUnitCost" class="block text-sm font-medium mt-4">Maximum
                                                Unit
                                                Cost:</label>
                                            <input type="number" id="maxUnitCost-{{ $loop->iteration }}"
                                                value="{{ $rqdDet->rqdMaxCost }}" name="rqdMaxCost[]"
                                                class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 maxUnitCost">
                                            <div class="target-insert-point">

                                            </div>
                                            <div class="mt-4 flex items-center">
                                                <input type="checkbox"
                                                    id="commentsCheckbox-row-{{ $loop->iteration }}"
                                                    class="rounded commentsCheckbox" name="lineCmmts[]"
                                                    data-row-id="row-{{ $loop->iteration }}" data-toggle="modal"
                                                    data-target="#commentsModal-row-{{ $loop->iteration }}"
                                                    value="true" @if($rqdDet->lineCmmts == 'true') checked @endif>
                                                <label for="commentsCheckbox-row-{{ $loop->iteration }}"
                                                    class="text-sm font-medium ml-2">Comments</label>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="maxExtCost" class="block text-sm font-medium">Max Extended
                                                    Cost:</label>
                                                <input type="number" id="maxExtCost-{{ $loop->iteration }}"
                                                    value="{{ $rqdDet->maxExtCost }}"
                                                    class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 maxExtCost"
                                                    readonly>

                                                <label for="extCost" class="block text-sm font-medium mt-4">Extended
                                                    Cost:</label>
                                                <input type="number" id="extCost-{{ $loop->iteration }}"
                                                    value="{{ $rqdDet->extCost }}"
                                                    class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 extCost"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modalcomment">
                                        {{-- Modal Comment Template --}}
                                        <div id="commentsModal-row-{{ $loop->iteration }}"
                                            class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto bg-opacity-50 modal hidden"
                                            aria-hidden="true">
                                            <div
                                                class="relative w-full max-w-4xl max-h-full bg-white rounded-lg shadow-lg">
                                                <!-- Modal Content -->
                                                <div class="relative">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <label
                                                            class="text-xl font-medium text-gray-900">Comment</label>
                                                        <label
                                                            class="modal-close text-medium font-medium text-gray-900 cursor-pointer"
                                                            data-target="#commentsModal-row-{{ $loop->iteration }}">
                                                            <i class="modal-close fa fa-times" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                    <div class="p-2 md:p-3 space-y-4 controls">
                                                        <textarea id="cmtCmmt-{{ $loop->iteration }}" name="cmtCmmt[]" class="commentText form-control" cols="30"
                                                            rows="10" style="border: none; width: 100%;">{{ $rqdDet->rqdCmt }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button"
                                        class="removeLineItem bg-red-500 text-white px-4 py-2 rounded">Hapus
                                        Item</button>

                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-center mt-4">
                            <button type="button" id="addLineItem"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Item</button>
                        </div>
                    </section>
                    <h6>Confirmation</h6>
                    <section>
                        <div class="grid grid-cols-1">
                            <div class="">
                                <div class="form-group">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Product Details:</label>
                                    <table class="min-w-full border-collapse block md:table">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="border-b dark:border-slate-600 font-medium p-4 text-slate-500  text-left">
                                                    Item Number</th>
                                                <th
                                                    class="border-b dark:border-slate-600 font-medium p-4 text-slate-500  text-left">
                                                    Qty</th>
                                                <th
                                                    class="border-b dark:border-slate-600 font-medium p-4 text-slate-500  text-left">
                                                    Price</th>
                                                <th
                                                    class="border-b dark:border-slate-600 font-medium p-4 text-slate-500  text-left">
                                                    Max Extended Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody id="overviewTableBody">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div class="form-group">
                                        <label class="form-label">Route To: <span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="text" class="form-control w-full required"
                                                id="routeto" name="routeToApr" aria-invalid="true" readonly
                                                value="{{ $editRqm->routeToApr }}">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="buyer" class="block mb-2 text-sm font-medium ">
                                            Buyer:<span class="text-danger">*</span></label></label>
                                        <select class="form-select w-full required" id="buyer"
                                            name="routeToBuyer" aria-invalid="true">
                                            <option value="linda" @selected($editRqm->routeToBuyer == 'linda')>Linda</option>
                                            <option value="rahman" @selected($editRqm->routeToBuyer == 'rahman')>Rahman</option>
                                        </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="c-inputs-stacked">
                                        <input type="checkbox" id="allInfoCorrectCheckbox" class="rounded required"
                                            name="allInfoCorrect" value="true" @checked($editRqm->allInfoCorrect == 'true') checked>
                                        <label for="allInfoCorrectCheckbox" class="d-block">All Data is
                                            Correct? <span class="text-danger">*</span></label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                   
                </form>
            </div>
        </div>
    </section>


    @push('scripts')
        {{-- /* PR Number */ --}}
        <script>
            $(document).ready(function() {
                $('#prNumberInput').on('keypress', function(event) {
                    if (event.keyCode === 13) { // Jika tombol Enter ditekan
                        event.preventDefault(); // Mencegah form dari submit secara default

                        var token = $('input[name="_token"]').val(); // Mengambil CSRF token
                        var prNumber = $('#prNumberInput').val(); // Mengambil nilai dari input

                        $.ajax({
                            url: '{{ route('get.pr.number') }}', // URL tujuan
                            type: 'POST', // Metode request
                            data: {
                                _token: token, // CSRF token
                                prNumber: prNumber // Data yang dikirim
                            },
                            dataType: 'json', // Tipe data yang diharapkan dari server
                            success: function(response) {
                                if (response.prNumber) {
                                    var formattedNumber = 'PR' + response
                                        .prNumber; // Menambahkan "PR" sebelum nomor
                                    $('#prNumberInput').val(
                                        formattedNumber
                                    ); // Menetapkan nomor PR yang diformat ke input
                                } else {
                                    alert('Error: Nomor PR tidak ditemukan');
                                }
                            },
                            error: function(xhr, status, error) {
                                alert('Error: ' + error); // Menampilkan pesan error
                            }
                        });
                    }
                });
            });
        </script>


        {{-- /* dynamis */ --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const addLineItemButton = document.getElementById('addLineItem');
                // addLineItemButton.disabled = true; // Atur disabled pada awalnya

                const itemNumberInput = document.querySelector('.itemnumber');
                const qtyInput = document.querySelector('.reqQty');
                const unitCostInput = document.querySelector('.unitCost');
                const stockUMQtyInput = document.querySelector('.stockUMQty');
                const maxUnitCostInput = document.querySelector('.maxUnitCost');
                const maxExtCostInput = document.querySelector('.maxExtCost');
                const ExtCostInput = document.querySelector('.extCost');

                [itemNumberInput, qtyInput, unitCostInput].forEach(input => {
                    input.addEventListener('input', function() {
                        stockUMQtyInput.value = qtyInput.value;
                        maxUnitCostInput.value = unitCostInput.value;
                        ExtCostInput.value = unitCostInput.value;

                        const reqQty = parseFloat(qtyInput.value) || 0;
                        const unitCost = parseFloat(unitCostInput.value) || 0;
                        const maxExtendedCost = (reqQty * unitCost).toFixed(2);
                        maxExtCostInput.value = maxExtendedCost;
                        ExtCostInput.value = maxExtendedCost;
                        generateOverviewTable();
                    });
                });
                // Event listener for adding a line item
                document.getElementById('addLineItem').addEventListener('click', function() {
                    addLineItem();
                });



                // Event delegation for remove buttons, modal triggers, and modal actions
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('removeLineItem')) {
                        removeLineItem(event.target);
                    } else if (event.target.closest('.modal-trigger')) {
                        openModal(event.target.closest('.modal-trigger'));
                    } else if (event.target.classList.contains('selectData')) {
                        selectData(event.target);
                    } else if (event.target.classList.contains('modal-close')) {
                        closeModal(event.target.closest('.modal'));
                    }
                });
                let lineItemsData = [];
                let deletedLineNumbers = [];
                let modalContainer = document.querySelector('.modalcomment');


                function addLineItem() {
                    const lineItemContainer = document.getElementById('lineItemsContainer');
                    if (!lineItemContainer) {
                        console.error('Container for line items not found');
                        return;
                    }

                    // Find the highest rqdLine value in existing line items
                    const rqdLineInputs = lineItemContainer.querySelectorAll('.rqdLine');
                    let maxRqdLine = 0;
                    rqdLineInputs.forEach(input => {
                        const value = parseInt(input.value, 10);
                        if (!isNaN(value) && value > maxRqdLine) {
                            maxRqdLine = value;
                        }
                    });

                    const newRqdLineValue = maxRqdLine + 1;

                    const lineItemTemplate = document.querySelector('.lineItem').cloneNode(true);
                    if (!lineItemTemplate) {
                        console.error('Template for line items not found');
                        return;
                    }

                    // Reset all input values and update IDs
                    lineItemTemplate.querySelectorAll('input, textarea, select').forEach(input => {
                        input.value = ''; // Reset input values
                        if (input.id) {
                            const originalId = input.id;
                            const newId = `${originalId}-${newRqdLineValue}`;
                            input.id = newId;
                            const label = lineItemTemplate.querySelector(`label[for="${originalId}"]`);
                            if (label) {
                                label.setAttribute('for', newId);
                            }
                        }
                    });

                    const commentText = lineItemTemplate.querySelector('.commentText');
                    if (commentText) {
                        commentText.value = '';
                    }

                    // Unhide the remove button
                    const removeButton = lineItemTemplate.querySelector('.removeLineItem');
                    if (removeButton) {
                        removeButton.classList.remove('hidden');
                    }

                    // Update the data-row-id attribute
                    lineItemTemplate.setAttribute('data-row-id', newRqdLineValue);

                    // Add the new line number
                    const newLineNumber = document.createElement('div');
                    newLineNumber.classList.add('line-number');
                    newLineNumber.innerHTML = `
                            <div class="text-md p-5 font-bold">Line ${newRqdLineValue}</div>
                            <div class="grid grid-cols-2 md:grid-cols-5 gap-4"></div>
                        `;
                    lineItemTemplate.prepend(newLineNumber);

                    // Set rqdLine value
                    const rqdLineInput = lineItemTemplate.querySelector('.rqdLine');
                    if (rqdLineInput) {
                        rqdLineInput.value = newRqdLineValue;
                    } else {
                        const newRqdLineInput = document.createElement('input');
                        newRqdLineInput.type = 'hidden';
                        newRqdLineInput.classList.add('rqdLine');
                        newRqdLineInput.name = 'rqdLine[]';
                        newRqdLineInput.value = newRqdLineValue;
                        lineItemTemplate.appendChild(newRqdLineInput);
                    }

                    // Remove existing comments checkbox and label
                    const existingCheckboxContainer = lineItemTemplate.querySelector('.commentsCheckbox')?.parentNode;
                    if (existingCheckboxContainer) {
                        existingCheckboxContainer.remove();
                    }

                    // Add event listeners for quantity and cost inputs
                    lineItemTemplate.querySelector('.reqQty')?.addEventListener('input', function() {
                        updateRealTimeValues.call(this);
                        generateOverviewTable();
                    });
                    lineItemTemplate.querySelector('.unitCost')?.addEventListener('input', function() {
                        updateRealTimeValues.call(this);
                        generateOverviewTable();
                    });
                    lineItemTemplate.querySelector('.itemnumber')?.addEventListener('input', function() {
                        generateOverviewTable();
                    });

                    // Handle comment checkbox creation
                    const commentsCheckbox = document.createElement('input');
                    commentsCheckbox.type = 'checkbox';
                    commentsCheckbox.id = `commentsCheckbox-row-${newRqdLineValue}`;
                    commentsCheckbox.classList.add('rounded', 'commentsCheckbox');
                    commentsCheckbox.name = 'lineCmmts[]';
                    commentsCheckbox.setAttribute('data-row-id', newRqdLineValue);
                    commentsCheckbox.setAttribute('data-toggle', 'modal');
                    commentsCheckbox.setAttribute('data-target', `#commentsModal-row-${newRqdLineValue}`);
                    commentsCheckbox.value = 'false'; // Set default value to false

                    // Create a hidden input that mimics the checkbox
                    const hiddenCheckbox = document.createElement('input');
                    hiddenCheckbox.type = 'hidden';
                    hiddenCheckbox.name = 'lineCmmts[]';
                    hiddenCheckbox.value = 'false';

                    // Event listener to toggle modal and update checkbox value
                    commentsCheckbox.addEventListener('change', function(event) {
                        toggleModal(event.target);
                        commentsCheckbox.value = event.target.checked ? 'true' : 'false';
                        hiddenCheckbox.disabled = event.target
                            .checked; // Disable hidden input when checkbox is checked
                        updateCommentTextarea(event.target.checked,
                            newRqdLineValue
                        ); // Call function to update comment textarea based on checkbox status
                    });

                    // Create a label for the comments checkbox
                    const commentsLabel = document.createElement('label');
                    commentsLabel.setAttribute('for', `commentsCheckbox-row-${newRqdLineValue}`);
                    commentsLabel.textContent = 'Comments';
                    commentsLabel.classList.add('text-sm', 'font-medium', 'ml-2');

                    // Create a container for checkbox and label
                    const checkboxContainer = document.createElement('div');
                    checkboxContainer.classList.add('mt-4', 'flex', 'items-center');
                    checkboxContainer.appendChild(commentsCheckbox);
                    checkboxContainer.appendChild(commentsLabel);
                    checkboxContainer.appendChild(hiddenCheckbox); // Append the hidden input

                    // Find the target insert point or fallback to appending to template
                    const targetInsertPoint = lineItemTemplate.querySelector('.target-insert-point');
                    if (targetInsertPoint) {
                        targetInsertPoint.appendChild(checkboxContainer);
                    } else {
                        lineItemTemplate.appendChild(checkboxContainer);
                    }

                    // Function to update comment textarea based on checkbox status
                    function updateCommentTextarea(checked, rowIndex) {
                        const commentTextarea = document.getElementById(`commentText-${rowIndex}`);
                        if (commentTextarea) {
                            if (checked) {
                                // Enable textarea and set initial value if necessary
                                commentTextarea.removeAttribute('disabled');
                                if (commentTextarea.value.trim() === '') {
                                    commentTextarea.value = ' '; // Set your initial comment text here if needed
                                }
                            } else {
                                // Disable textarea and clear value
                                commentTextarea.setAttribute('disabled', true);
                                commentTextarea.value = '';
                            }
                        }
                    }
                    // Trigger input events for itemnumber, reqQty, supplier, unitCost, purAcct
                    lineItemTemplate.querySelector('.itemnumber')?.dispatchEvent(new Event('input'));
                    lineItemTemplate.querySelector('.reqQty')?.dispatchEvent(new Event('input'));
                    lineItemTemplate.querySelector('.supplier')?.dispatchEvent(new Event('input'));
                    lineItemTemplate.querySelector('.unitCost')?.dispatchEvent(new Event('input'));
                    lineItemTemplate.querySelector('.purracct')?.dispatchEvent(new Event('input'));

                    const dueDateInput = lineItemTemplate.querySelector('.rqdDueDate');
                    dueDateInput.value = new Date().toISOString().split('T')[
                        0]; // Sesuaikan dengan tanggal saat ini dalam format Y-m-d

                    // Set nilai default pada elemen input dengan class 'rqdNeedDate'
                    const needDateInput = lineItemTemplate.querySelector('.rqdNeedDate');
                    needDateInput.value = new Date().toISOString().split('T')[
                        0]; // Sesuaikan dengan tanggal saat ini dalam format Y-m-d

                    // Set nilai default pada elemen input dengan class 'purracct'
                    const purracctInput = lineItemTemplate.querySelector('.purracct');
                    purracctInput.value = '5516'; // Sesuaikan dengan nilai yang Anda inginkan

                    updateRowIndices(); // Assuming this function updates all row indices and rqdLines
                    const newRqdLine = document.querySelectorAll('.rqdLine')
                        .length; // Get the latest rqdLine count or value
                    const modalTemplate = createCommentModal(newRqdLine); // Create modal with the new modalId
                    modalContainer.appendChild(modalTemplate); // Append modal to modalContainer
                    // Append the new line item to the container
                    lineItemContainer.appendChild(lineItemTemplate);

                    updateCosts();
                    generateOverviewTable();
                }


                function removeLineItem(button) {
                    // Mendapatkan elemen baris yang terdekat dari tombol yang diklik
                    const lineItem = button.closest('.lineItem');

                    if (lineItem) {
                        // Mencari elemen di atasnya dengan kelas tertentu
                        const lineHeader = lineItem.previousElementSibling;
                        if (lineHeader && lineHeader.classList.contains('text-md')) {
                            lineHeader.remove(); // Menghapus elemen header jika ada
                        }

                        // Mengecek apakah baris memiliki kelas 'newLine'
                        const isNewLine = lineItem.classList.contains('newLine');

                        // Menghapus baris dari tampilan
                        lineItem.remove();

                        if (isNewLine) {
                            // Memperbarui biaya dan tabel tampilan untuk baris baru
                            updateCosts(); // Contoh: fungsi lain yang diperlukan untuk baris baru
                            generateOverviewTable(); // Contoh: fungsi lain yang diperlukan untuk baris baru
                        } else {
                            // Mengambil nomor PR yang sesuai
                            const rqmNbr = '{{ $editRqm->rqmNbr }}'; // Ganti dengan nilai PR yang sesuai
                            const rqdLineInput = lineItem.querySelector('.rqdLine');
                            const rqdLine = rqdLineInput ? rqdLineInput.value : null;

                            // Jika rqdLine ada, panggil fungsi untuk menghapus baris dari database via AJAX
                            if (rqdLine) {
                                deleteLineItemViaAjax(rqmNbr, rqdLine);
                            }
                        }
                    }
                }


                function deleteLineItemViaAjax(rqmNbr, rqdLine) {
                    const url = "{{ route('rqm.deleteLine') }}";
                    const formData = new FormData();
                    formData.append('rqmNbr', rqmNbr);
                    formData.append('rqdLine', rqdLine);

                    // Get CSRF token from meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    formData.append('_token', csrfToken);

                    // Show confirmation dialog
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User confirmed, proceed with AJAX request
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Your file has been deleted.",
                                            icon: "success"
                                        }).then(() => {
                                            // Update UI to reflect deletion of line item
                                            const lineItemElement = document.querySelector(
                                                `[data-rqd-line="${rqdLine}"]`);
                                            if (lineItemElement) {
                                                lineItemElement.remove();
                                                // Update overview table
                                                generateOverviewTable();
                                            }
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    // No error handling message here
                                }
                            }).catch(() => {
                                // No catch block here
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // User cancelled, do nothing
                            Swal.fire({
                                title: "Cancelled",
                                text: "Line item deletion cancelled.",
                                icon: "info"
                            });
                        }
                    });
                }



                function updateRowIndices() {
                    const lineItems = document.querySelectorAll('.lineItem');
                    lineItems.forEach((lineItem, index) => {
                        const newIndex = index + 1;
                        lineItem.setAttribute('data-row-id', newIndex);

                        const lineNumber = lineItem.querySelector('.line-number');
                        if (lineNumber) {
                            lineNumber.innerText = `Line ${newIndex}`;
                        }

                        lineItem.querySelectorAll('input').forEach(input => {
                            if (input.id) {
                                const originalId = input.id.split('-')[0];
                                input.id = `${originalId}-${newIndex}`;
                                const label = lineItem.querySelector(`label[for="${input.id}"]`);
                                if (label) {
                                    label.setAttribute('for', input.id);
                                }
                            }
                        });

                        const commentsCheckbox = lineItem.querySelector('.commentsCheckbox');
                        if (commentsCheckbox) {
                            commentsCheckbox.id = `commentsCheckbox-row-${newIndex}`;
                            commentsCheckbox.setAttribute('data-row-id', newIndex);
                            const commentsLabel = lineItem.querySelector(
                                `label[for="commentsCheckbox-row-${newIndex}"]`);
                            if (commentsLabel) {
                                commentsLabel.setAttribute('for', `commentsCheckbox-row-${newIndex}`);
                            }
                        }
                    });
                }
                // Initialize array cmtCmmt
                let cmtCmmt = [];

                // Function to add event listener to a textarea
                function addCommentEventListener(textArea) {
                    textArea.addEventListener('input', function() {
                        const commentIndex = textArea.getAttribute('data-row-id');
                        cmtCmmt[commentIndex] = textArea.value.trim(); // Save trimmed comment
                        console.log(`Comment ${commentIndex}: ${textArea.value}`);
                    });
                }

                // Function to create a new comment modal
                function createCommentModal(newRqdLine) {
                    const modalTemplate = document.querySelector('#commentsModal-template').cloneNode(true);
                    modalTemplate.id = `commentsModal-row-${newRqdLine}`;;

                    const commentTextarea = modalTemplate.querySelector('.commentText');
                    commentTextarea.id = `commentText-${newRqdLine}`;

                    // Update name attribute for commentText textarea
                    commentTextarea.setAttribute('name', `cmtCmmt[]`);


                    // Update data-target for close modal button
                    const modalCloseButton = modalTemplate.querySelector('.modal-close');
                    modalCloseButton.setAttribute('data-target', `#${newRqdLine}`);

                    // Check if rqdId exists and set cmtCmmt content accordingly
                    if (cmtCmmt[newRqdLine]) {
                        commentTextarea.value = cmtCmmt[newRqdLine]; // Menampilkan nilai cmtCmmt sesuai rqdId
                    } else {
                        commentTextarea.value = ''; // Atau nilai default yang diinginkan jika tidak ada
                    }

                    // Update other modal content as needed

                    return modalTemplate;
                }

                // Function to toggle modal visibility
                function toggleModal(checkbox) {
                    const modalContainer = document.querySelector('.modalcomment');
                    if (!modalContainer) {
                        console.error('Modal container not found.');
                        return;
                    }

                    const rowId = checkbox.getAttribute('data-row-id');
                    const modalId = `commentsModal-row-${rowId}`;
                    let modal = modalContainer.querySelector(`#${modalId}`);

                    if (!modal) {
                        modal = createCommentModal(rowId);
                        modalContainer.appendChild(modal);
                    }

                    if (checkbox.checked) {
                        modal.classList.remove('hidden');
                    } else {
                        modal.classList.add('hidden');
                    }
                }
                // Event listener for modal close buttons
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('modal-close')) {
                        const targetModalId = event.target.getAttribute('data-target');
                        const targetModal = document.querySelector(targetModalId);

                        if (targetModal) {
                            targetModal.classList.add('hidden');
                            const commentTextarea = targetModal.querySelector('.commentText');
                            const commentIndex = commentTextarea.id.split('-')[1];
                            cmtCmmt[commentIndex] = commentTextarea.value.trim(); // Save trimmed comment
                            console.log(`Saved comment ${commentIndex}: ${commentTextarea.value}`);
                        } else {
                            console.error(`Modal with ID ${targetModalId} not found.`);
                        }
                    }
                });
                // Initialize event listeners for comment checkboxes
                document.querySelectorAll('.commentsCheckbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function(event) {
                        toggleModal(event.target);
                    });
                });
                // Function to initialize DataTables
                function initializeDataTable(table) {
                    if ($.fn.DataTable.isDataTable(table)) {
                        table.DataTable().clear().destroy(); // Clear and destroy if table is already initialized
                    }
                    table.DataTable({
                        "pageLength": 10,
                        "lengthChange": false,
                        "pagingType": "simple_numbers"
                    });
                }

                // Function to open a modal and load its content dynamically
                function openModal(trigger) {
                    const target = trigger.getAttribute('data-modal-target');
                    const modal = document.getElementById(target);

                    if (!modal) {
                        console.error(`Modal with ID '${target}' not found.`);
                        return;
                    }

                    const modalTitle = modal.querySelector('.modal-title');
                    const tableBody = modal.querySelector('.dynamicTableBody');
                    const rowToFill = trigger.closest('.lineItem'); // Identify the row that triggered the modal

                    // Store the rowToFill in the modal's dataset for later use
                    const rowId = rowToFill.getAttribute('data-row-id');
                    modal.setAttribute('data-row-to-fill', rowId);
                    console.log("Opening modal for row ID:", rowId); // Debugging

                    // Clear previous table body content
                    tableBody.innerHTML = '';

                    let ajaxUrl = '';
                    let ajaxData = {};

                    // Check if the direct checkbox is checked
                    const directCheckbox = document.getElementById('directCheckbox');
                    if (directCheckbox && directCheckbox.checked) {
                        // Make itemnumber input readonly
                        const itemnumberInput = rowToFill.querySelector('.itemnumber');
                        if (itemnumberInput) {
                            itemnumberInput.setAttribute('readonly', 'readonly');
                        }
                    }

                    if (target === 'modal-item') {
                        if (modalTitle) {
                            modalTitle.innerText = 'Items';
                        }
                        ajaxUrl = '{{ route('get.items.ajax') }}';
                        ajaxData = {
                            type: 'items'
                        };

                        // Check if the direct checkbox is checked
                        const directCheckbox = document.getElementById('directCheckbox');
                        if (directCheckbox && directCheckbox.checked) {
                            ajaxData.pt_prod_line = ['0110', '0111', '0112', '0113', '0114', '0115', '0120', '0201',
                                '0202', '0203', '0204', '0205', '0206', '0207', '0208', '0209', '0210', '0212',
                                '0213', '0214', '0215', '0216', '0217', '0218', '0220', '0221', '0222', '0309',
                                '0310', '0311', '0312', '0313', '0314', '0315', '0316', '0317', '0401', '0402',
                                '0403'
                            ];
                            ajaxData.pt_taxable = 'true';
                        }
                    } else if (target === 'modal-supplieritem') {
                        if (modalTitle) {
                            modalTitle.innerText = 'Supplier';
                        }
                        ajaxUrl = '{{ route('get.suppliers.ajax') }}';
                        ajaxData = {
                            type: 'supplier'
                        };
                    } else if (target === 'modal-purracct') {
                        if (modalTitle) {
                            modalTitle.innerText = 'Purchasing Account';
                        }
                        ajaxUrl = '{{ route('get.account.ajax') }}';
                        ajaxData = {
                            type: 'account'
                        };
                    }

                    $.ajax({
                        url: ajaxUrl,
                        type: 'GET',
                        data: ajaxData,
                        success: function(response) {
                            console.log("Response received successfully:",
                                response); // Check response in console log
                            let tableBodyHtml = '';

                            if (target === 'modal-item') {
                                response.data.forEach(item => {
                                    tableBodyHtml += `
                        <tr class="cursor-pointer" data-supplier-code="${item.pt_part}" data-um="${item.pt_um}" data-desc1="${item.pt_desc1}">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${item.pt_part}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${item.pt_desc1}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${item.pt_um}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${item.pt_part_type}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${item.pt_status === '0002' ? 'Non Active' : 'Active'}</td>
                        </tr>`;
                                });
                                // If direct checkbox is checked, itemnumber input should be readonly
                                if (directCheckbox && directCheckbox.checked) {
                                    const itemnumberInput = rowToFill.querySelector('.itemnumber');
                                    if (itemnumberInput) {
                                        itemnumberInput.setAttribute('readonly', 'readonly');
                                    }
                                }
                            } else if (target === 'modal-supplieritem') {
                                response.data.forEach(supplier => {
                                    tableBodyHtml += `
                        <tr class="cursor-pointer" data-supplier-code="${supplier.vd_addr}">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${supplier.vd_addr}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${supplier.vd_sort}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${supplier.ad_name}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${supplier.ad_line1}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${supplier.ad_city}</td>
                        </tr>`;
                                });
                            } else if (target === 'modal-purracct') {
                                response.data.forEach(account => {
                                    tableBodyHtml += `
                        <tr class="cursor-pointer" data-supplier-code="${account.ac_code}">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${account.ac_code}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${account.ac_desc}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${account.ac_curr}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-md text-gray-600 uppercase tracking-wider">${account.ac_gl_type}</td>
                        </tr>`;
                                });
                            }

                            tableBody.innerHTML = tableBodyHtml;

                            // Attach click event to table rows
                            tableBody.querySelectorAll('tr').forEach(row => {
                                row.addEventListener('click', () => {
                                    // Get the rowToFill element using the stored dataset attribute
                                    const rowToFillId = modal.getAttribute(
                                        'data-row-to-fill');
                                    const rowToFill = document.querySelector(
                                        `[data-row-id="${rowToFillId}"]`);

                                    if (rowToFill) {
                                        console.log("Row to fill found:", rowToFill);

                                        // Set input values and close modal
                                        if (target === 'modal-item') {
                                            if (rowToFill.querySelector('.itemnumber')) {
                                                rowToFill.querySelector('.itemnumber')
                                                    .value = row.getAttribute(
                                                        'data-supplier-code');
                                            }
                                            if (rowToFill.querySelector('.rqdUm')) {
                                                rowToFill.querySelector('.rqdUm').value =
                                                    row.getAttribute('data-um');
                                            }
                                            if (rowToFill.querySelector('.rqdDesc')) {
                                                const desc = row.getAttribute('data-desc1');
                                                rowToFill.querySelector('.rqdDesc').value =
                                                    desc ? desc : rowToFill.querySelector(
                                                        '.itemnumber').value;
                                                updateRealTimeValues.call(rowToFill
                                                    .querySelector('.rqdDesc')
                                                ); // Update real-time values appropriately
                                            }
                                        } else if (target === 'modal-supplieritem') {
                                            if (rowToFill.querySelector('.supplieritem')) {
                                                rowToFill.querySelector('.supplieritem')
                                                    .value = row.getAttribute(
                                                        'data-supplier-code');
                                            }
                                        } else if (target === 'modal-purracct') {
                                            if (rowToFill.querySelector('.purracct')) {
                                                rowToFill.querySelector('.purracct').value =
                                                    row.getAttribute('data-supplier-code');
                                            }
                                        }

                                        // Close the modal
                                        closeModal(modal);
                                    } else {
                                        console.error("Row to fill not found for ID:",
                                            rowToFillId);
                                    }
                                });
                            });

                            initializeDataTable($(modal).find('.dataModalTable'));

                            modal.classList.remove('hidden');
                        },
                        error: function(xhr, status, error) {
                            alert('Error: ' + error);
                        }
                    });
                }

                // Function to close the modal
                function closeModal(modal) {
                    if (!modal) {
                        console.error('Modal element is not provided.');
                        return;
                    }

                    // Destroy DataTable if it exists
                    const table = $(modal).find('.dataModalTable');
                    if ($.fn.DataTable.isDataTable(table)) {
                        table.DataTable().clear().destroy();
                    }

                    // Clear modal content if it has dynamicTableBody
                    const dynamicTableBody = modal.querySelector('.dynamicTableBody');
                    if (dynamicTableBody) {
                        dynamicTableBody.innerHTML = '';
                    }

                    // Hide modal
                    modal.classList.add('hidden');
                    modal.removeAttribute('data-row-id');
                }


                // Function to generate the overview table
                function generateOverviewTable() {
                    const lineItems = document.querySelectorAll('.lineItem');
                    const overviewTableBody = document.getElementById('overviewTableBody');
                    overviewTableBody.innerHTML = ''; // Clear previous content

                    lineItems.forEach(lineItem => {
                        const itemNumber = lineItem.querySelector('.itemnumber').value;
                        const reqQty = lineItem.querySelector('.reqQty').value;
                        const unitCost = lineItem.querySelector('.unitCost').value;
                        const maxExtendedCost = (parseFloat(reqQty) * parseFloat(unitCost)).toFixed(2);

                        console.log(
                            `Menambahkan item dengan itemNumber: ${itemNumber}, reqQty: ${reqQty}, unitCost: ${unitCost}, maxExtendedCost: ${maxExtendedCost}`
                        );

                        const row = document.createElement('tr');
                        row.classList.add('border-b', 'hover:bg-gray-50');

                        row.innerHTML = `
                                        <td class="px-6 py-4">${itemNumber}</td>
                                        <td class="px-6 py-4">${reqQty}</td>
                                        <td class="px-6 py-4">${unitCost}</td>
                                        <td class="px-6 py-4">${maxExtendedCost}</td>
                                    `;

                        // Check if data is not null or undefined before appending to the table body
                        if (itemNumber && reqQty && unitCost && maxExtendedCost) {
                            overviewTableBody.appendChild(row);
                        }
                    });
                }


                // Function to update costs
                function updateCosts() {
                    const lineItems = document.querySelectorAll('.lineItem');

                    lineItems.forEach(lineItem => {
                        const reqQtyInput = lineItem.querySelector('.reqQty');
                        const stockUMQtyInput = lineItem.querySelector('.stockUMQty');
                        const unitCostInput = lineItem.querySelector('.unitCost');
                        const maxUnitCostInput = lineItem.querySelector('.maxUnitCost');
                        const extCostInput = lineItem.querySelector('.extCost');
                        const maxExtCostInput = lineItem.querySelector('.maxExtCost');

                        // Check if elements exist before setting their values
                        if (reqQtyInput && stockUMQtyInput && unitCostInput && maxUnitCostInput &&
                            extCostInput && maxExtCostInput) {
                            const reqQty = parseFloat(reqQtyInput.value) || 0;
                            const unitCost = parseFloat(unitCostInput.value) || 0;
                            const maxExtendedCost = (reqQty * unitCost).toFixed(2);

                            console.log(
                                `Memperbarui biaya untuk item dengan reqQty: ${reqQty}, unitCost: ${unitCost}, maxExtendedCost: ${maxExtendedCost}`
                            );

                            maxExtCostInput.value = maxExtendedCost;
                            extCostInput.value = maxExtendedCost;
                            stockUMQtyInput.value = reqQty;
                            maxUnitCostInput.value = unitCost;
                            generateOverviewTable();
                        } else {
                            console.error('Some inputs are missing in the line item:', {
                                reqQtyInput,
                                stockUMQtyInput,
                                unitCostInput,
                                maxUnitCostInput,
                                extCostInput,
                                maxExtCostInput,
                            });
                        }
                    });
                }

                // Function to update real-time values
                function updateRealTimeValues() {
                    const lineItem = this.closest('.lineItem');
                    const reqQtyInput = lineItem.querySelector('.reqQty');
                    const stockUMQtyInput = lineItem.querySelector('.stockUMQty');
                    const unitCostInput = lineItem.querySelector('.unitCost');
                    const maxUnitCostInput = lineItem.querySelector('.maxUnitCost');
                    const extCostInput = lineItem.querySelector('.extCost');
                    const maxExtCostInput = lineItem.querySelector('.maxExtCost');

                    // Check if elements exist before setting their values
                    if (reqQtyInput && stockUMQtyInput && unitCostInput && maxUnitCostInput &&
                        extCostInput && maxExtCostInput) {
                        const reqQty = parseFloat(reqQtyInput.value) || 0;
                        const unitCost = parseFloat(unitCostInput.value) || 0;
                        const maxExtendedCost = (reqQty * unitCost).toFixed(2);

                        maxExtCostInput.value = maxExtendedCost;
                        extCostInput.value = maxExtendedCost;
                        stockUMQtyInput.value = reqQty;
                        maxUnitCostInput.value = unitCost;
                    } else {
                        console.error('Some inputs are missing in the line item during real-time update:', {
                            reqQtyInput,
                            stockUMQtyInput,
                            unitCostInput,
                            maxUnitCostInput,
                            extCostInput,
                            maxExtCostInput
                        });
                    }
                }

                // Call the function initially to generate the table
                generateOverviewTable();

                // Initial call to update costs on page load
                updateCosts();

                const appstatusSelect = document.getElementById('appstatus');
                const directCheckbox = document.getElementById('directCheckbox');
                const nonPOCheckbox = document.getElementById('nonPOCheckbox');
                const allInfoCorrectCheckbox = document.getElementById('allInfoCorrectCheckbox');
                const lineCmmtsCheckboxes = document.querySelectorAll('input[name="lineCmmts[]"]');

                // Set initial values
                appstatusSelect.value = appstatusSelect.value === '2' ? 'Approved' : 'Unapproved';
                directCheckbox.value = directCheckbox.checked ? 'true' : 'false';
                nonPOCheckbox.value = nonPOCheckbox.checked ? 'true' : 'false';
                allInfoCorrectCheckbox.value = allInfoCorrectCheckbox.checked ? 'true' : 'false';

                // Mengatur nilai awal untuk lineCmmtsCheckboxes
                lineCmmtsCheckboxes.forEach(checkbox => {
                    checkbox.value = checkbox.checked ? 'true' : 'false';
                });

                // Add event listeners
                directCheckbox.addEventListener('change', function() {
                    this.value = this.checked ? 'true' : 'false';
                });

                nonPOCheckbox.addEventListener('change', function() {
                    this.value = this.checked ? 'true' : 'false';
                });

                allInfoCorrectCheckbox.addEventListener('change', function() {
                    this.value = this.checked ? 'true' : 'false';
                });

                lineCmmtsCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        this.value = this.checked ? 'true' : 'false';
                    });
                });

                appstatusSelect.addEventListener('change', function() {
                    this.value = this.value === '1' ? 'Unapproved' : 'Approved';
                });
            });
        </script>

        {{-- supplier --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Toggle modal visibility
                document.querySelectorAll('[data-modal-toggle]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-target');
                        const modal = document.getElementById(modalId);
                    });
                });

                // Hide modal
                document.querySelectorAll('[data-modal-hide]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-hide');
                        const modal = document.getElementById(modalId);
                        modal.classList.add('hidden');
                    });
                });

                // Set input value and close modal on row click
                document.querySelectorAll('#large-modal tbody tr').forEach(row => {
                    row.addEventListener('click', () => {
                        const supplierCode = row.getAttribute('data-supplier-code');
                        document.getElementById('supplier').value = supplierCode;
                        document.getElementById('modal-close-a').click();
                    });
                });
            });

            $(document).ready(function() {
                $('#supplierTable').DataTable({
                    "pageLength": 10,
                    "lengthChange": false,
                    "pagingType": "simple_numbers" // Ubah sesuai kebutuhan: simple, simple_numbers, full, atau full_numbers
                });
            });
        </script>

        {{-- cost center --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                // Toggle modal visibility
                document.querySelectorAll('[data-modal-toggle]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-target');
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.classList.toggle('hidden');
                        }
                    });
                });

                // Hide modal
                document.querySelectorAll('[data-modal-hide]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-hide');
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.classList.add('hidden');
                        }
                    });
                });

                // Set input value and close modal on row click
                document.querySelectorAll('#large-modal-cost tbody tr').forEach(row => {
                    row.addEventListener('click', () => {
                        const costCenter = row.getAttribute('data-supplier-code');
                        const costCenterInput = document.getElementById('costcenter');
                        costCenterInput.value = costCenter;
                        document.getElementById('modal-close-a-cost').click();

                        // Manually trigger change event
                        const event = new Event('change');
                        costCenterInput.dispatchEvent(event);
                    });
                });

                // Fetch and handle approver data on cost center change
                const costCenterInput = document.getElementById('costcenter');
                if (costCenterInput) {
                    costCenterInput.addEventListener('change', function() {
                        const costCenter = this.value;
                        console.log('Cost center changed:', costCenter);
                        $.ajax({
                            type: 'GET',
                            url: `/get-approver`,
                            data: {
                                costCenter: costCenter
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log('Response data:', data);
                                if (data && data.rqa_apr) {
                                    const enduserInput = document.getElementById('enduser');
                                    const routetoInput = document.getElementById('routeto');

                                    // Capitalize the first letter of rqa_apr
                                    const rqaApr = data.rqa_apr.charAt(0).toUpperCase() + data
                                        .rqa_apr.slice(1);
                                    enduserInput.value = rqaApr;
                                    routetoInput.value = rqaApr;
                                } else {
                                    const enduserInput = document.getElementById('enduser');
                                    const routetoInput = document.getElementById('routeto');
                                    enduserInput.value = '';
                                    routetoInput.value = '';
                                    alert('Approver not found for this cost center.');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                                alert('Error: ' + error);
                            }
                        });
                    });
                } else {
                    console.log('Cost center input element not found');
                }
            });

            $(document).ready(function() {
                $('#costTable').DataTable({
                    "pageLength": 10,
                    "lengthChange": false,
                    "pagingType": "simple_numbers"
                });
            });
        </script>

        {{-- end user --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                // Toggle modal visibility
                document.querySelectorAll('[data-modal-toggle]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-target');
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.classList.toggle('hidden');
                        }
                    });
                });

                // Hide modal
                document.querySelectorAll('[data-modal-hide]').forEach(a => {
                    a.addEventListener('click', () => {
                        const modalId = a.getAttribute('data-modal-hide');
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.classList.add('hidden');
                        }
                    });
                });

                // Set input value and close modal on row click
                document.querySelectorAll('#large-modal-enduser tbody tr').forEach(row => {
                    row.addEventListener('click', () => {
                        const endUser = row.getAttribute('data-supplier-code');
                        const endUserInput = document.getElementById('enduser');
                        endUserInput.value = endUser;
                        document.getElementById('modal-close-a-enduser').click();

                        // Manually trigger change event
                        const event = new Event('change');
                        endUserInput.dispatchEvent(event);
                    });
                });
            });

            $(document).ready(function() {
                $('#endUserTable').DataTable({
                    "pageLength": 10,
                    "lengthChange": false,
                    "pagingType": "simple_numbers"
                });
            });
        </script>

        {{-- checkCurr --}}
        <script>
            // Add JavaScript to handle real-time validation and required field logic
            document.getElementById('currency').addEventListener('change', function(event) {
                var selectedCurrency = this.value;

                // Reset message container
                var messageContainer = document.getElementById('messageContainer');
                messageContainer.innerHTML = '';



                // Check if selected currency is IDR (123295)
                if (selectedCurrency === '123295') {
                    messageContainer.innerHTML = '<span class="text-green-600">Currency is available!</span>';

                } else {
                    // Call the backend API to check currency availability
                    fetch('{{ route('check.curr') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-Token': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                rqmCurr: selectedCurrency
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.error === 'true') {
                                messageContainer.innerHTML =
                                    '<span class="text-green-600">Currency is available!</span>';

                            } else {
                                messageContainer.innerHTML =
                                    '<span class="text-red-600">Currency not available right now, please choose another currency.</span>';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            messageContainer.innerHTML =
                                '<span class="text-red-600">An error occurred while checking currency.</span>';

                        });
                }

            });
        </script>
    @endpush

    {{-- modal supplier --}}

    <div id="large-modal" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full bg-white rounded-lg shadow-lg">
            <!-- Modal content -->
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Supplier</label>
                    <a type="a"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-md w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="large-modal" id="modal-close-a">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </a>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 text-md overflow-y-auto max-h-[calc(100vh-8rem)]">
                    <table class="min-w-full leading-normal" id="supplierTable">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Code Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Sort Name Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Address1</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    City</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $item)
                                <tr class="cursor-pointer" data-supplier-code="{{ $item->vd_addr }}">
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->vd_addr }}</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->vd_sort }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->ad_name }}</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->ad_line1 }}</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->ad_city }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- modal cost center --}}
    <div id="large-modal-cost" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Cost Center</label>
                    <a type="a"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="large-modal-cost" id="modal-close-a-cost">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </a>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <table class="min-w-full leading-normal" id="costTable">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Cost Center</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost as $item)
                                <tr class="cursor-pointer" data-supplier-code="{{ $item->cc_ctr }}">
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->cc_ctr }}</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->cc_desc }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->cc_active ? 'Active' : 'Non Active' }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal employee --}}
    <div id="large-modal-enduser" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Employee</label>
                    <a type="a"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-md w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="large-modal-enduser" id="modal-close-a-enduser">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </a>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <table class="min-w-full leading-normal" id="endUserTable">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Employee</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Sort Name</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    City</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Country</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Active</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Employee Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $item)
                                <tr class="cursor-pointer" data-supplier-code="{{ $item->emp_addr }}">
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_addr }}</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_sort }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_city }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_country }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_active ? 'Active' : 'Non Active' }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-600 uppercase tracking-wider">
                                        {{ $item->emp_emp_date }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-purracct" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full bg-white rounded-lg shadow-lg">
            <!-- Modal content -->
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Purchase Account</label>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-md w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white modal-close"
                        data-modal-hide="large-modal" id="modal-close-a">
                        <svg class="w-5 h-5 pointer-events-none" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 text-md overflow-y-auto max-h-[calc(100vh-8rem)]">
                    <table id="dataModalTable-account" class="min-w-full display dataModalTable">
                        <thead class="dynamicTableHead">
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Account Code</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Account Name</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Account Currency</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Account Type</th>
                            </tr>
                        </thead>
                        <tbody class="dynamicTableBody">
                            <!-- Dynamic content goes here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-supplieritem" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full bg-white rounded-lg shadow-lg">
            <!-- Modal content -->
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Supplier</label>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-md w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white modal-close"
                        data-modal-hide="large-modal" id="modal-close-supplier">
                        <svg class="w-5 h-5 pointer-events-none" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 text-md overflow-y-auto max-h-[calc(100vh-8rem)]">
                    <table id="dataModalTable-supplier" class="min-w-full leading-normal display dataModalTable">
                        <thead class="dynamicTableHead">
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Code Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Sort Name Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name Supplier</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Address1</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    City</th>
                            </tr>
                        </thead>
                        <tbody class="dynamicTableBody">
                            <!-- Dynamic content goes here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-item" tabindex="-1"
        class="fixed inset-0 z-50 flex items-start justify-center p-4 overflow-y-auto  bg-opacity-50 modal hidden"
        aria-hidden="true">
        <div class="relative w-full max-w-4xl max-h-full bg-white rounded-lg shadow-lg">
            <!-- Modal content -->
            <div class="relative">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <label class="text-xl font-medium text-gray-900">Items</label>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-md w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white modal-close"
                        data-modal-hide="large-modal" id="modal-close-item">
                        <svg class="w-5 h-5 pointer-events-none" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 text-md overflow-y-auto max-h-[calc(100vh-8rem)]">
                    <table id="dataModalTable-item" class="min-w-full leading-normal display dataModalTable">
                        <thead class="dynamicTableHead">
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Product Code</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Product Name</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    UM</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Item Type</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="dynamicTableBody">
                            <!-- Dynamic content goes here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
