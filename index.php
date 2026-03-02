<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>glow belleza | Makeup Artistry</title>
    <link rel="stylesheet" href="style.css?v=2.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,400&family=Montserrat:wght@200;400;500&display=swap"
        rel="stylesheet">
    <meta name="description"
        content="Descubre la belleza atemporal con glow belleza. Maquillaje de alta gama para la mujer moderna.">
</head>

<body>
    <div class="cursor-dot" id="cursor-dot"></div>
    <div class="cursor-outline" id="cursor-outline"></div>

    <header id="navbar">
        <div class="logo-container">
            <a href="#hero" class="logo-link">
                <img src="logo_estudio.jpg" alt="Logo Luxury Glow" class="logo-img-circular">
                <span class="logo-text">LUXURY GLOW</span>
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#hero">Inicio</a></li>
                <li><a href="#collection">Colección</a></li>
                <li><a href="#about">Filosofía</a></li>
                <li><a href="#contact">Contacto</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="#booking" class="nav-cta">Citas</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
                <li>
                    <button id="cart-btn" class="cart-trigger">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"></path>
                        </svg>
                        <span id="cart-count">0</span>
                    </button>
                </li>
            </ul>
        </nav>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <section id="hero" class="hero-section">
        <div class="hero-content">
            <h1 class="fade-in">Redefine tu <br><span class="highlight">Esencia</span></h1>
            <a href="#collection" class="cta-button fade-in delay-2">Descubrir</a>
        </div>
        <div class="hero-visual fade-in delay-1"></div>
    </section>

    <h2 class="section-title reveal">La Colección</h2>
    <div class="product-grid">
        <div class="product-card reveal">
            <img src="imagen1.jpg" alt="Natural" class="product-img">
            <h3>NATURAL</h3>
            <p class="price">EDICIÓN 01 — $500</p>
            <button class="add-cart">Añadir al set</button>
        </div>
        <div class="product-card reveal">
            <img src="imagen2.jpg" alt="Soft Glam" class="product-img">
            <h3>SOFT GLAM</h3>
            <p class="price">EDICIÓN 02 — $600</p>
            <button class="add-cart">Añadir al set</button>
        </div>
        <div class="product-card reveal">
            <img src="imagen3.jpg" alt="Smokey Eyes" class="product-img">
            <h3>SMOKEY</h3>
            <p class="price">EDICIÓN 03 — $1200</p>
            <button class="add-cart">Añadir al set</button>
        </div>
    </div>
    </div>
    </section>

    <section id="about" class="section-padding philosophy-section">
        <div class="container split-layout">
            <div class="text-content">
                <h2 class="section-title">Sobre Nosotros</h2>
                <p>En Glow Belleza, nuestra <strong>Fortaleza</strong> reside en la combinación de técnica avanzada y un
                    profundo entendimiento de la belleza individual. Nos dedicamos a resaltar lo mejor de cada persona
                    con un toque de lujo y exclusividad.</p>
                <div class="fortalezas-grid">
                    <div class="fortaleza-item reveal">
                        <h4>Atención Personalizada</h4>
                        <p>Cada servicio es diseñado a medida para tus rasgos y estilo.</p>
                    </div>
                    <div class="fortaleza-item reveal">
                        <h4>Productos Premium</h4>
                        <p>Utilizamos solo las mejores marcas de la industria.</p>
                    </div>
                </div>
                <a href="#contact" class="text-link">Contáctanos</a>
            </div>
            <img src="imagen4.jpg" alt="Filosofía LUXURY GLOW" class="philosophy-img">
        </div>
    </section>

    <?php if (isset($_SESSION['user_id'])): ?>
        <section id="booking" class="section-padding booking-section">
            <div class="container">
                <h2 class="section-title">Reserva tu Cita</h2>
                <form class="booking-form" action="registro.php" method="POST" id="bookingForm">
                    <input type="hidden" name="hora" id="selectedHora" required>

                    <div class="form-group triple">
                        <input type="text" name="nombre" placeholder="Nombre Completo"
                            value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>"
                            required>
                        <input type="email" name="email" placeholder="Correo Electrónico" required>
                        <input type="tel" name="telefono" placeholder="WhatsApp (Ej: +123...)" required>
                    </div>

                    <div class="form-group">
                        <select name="servicio" required>
                            <option value="" disabled selected>Selecciona Servicio</option>
                            <option value="natural">Natural - $500</option>
                            <option value="soft-glam">Soft Glam - $600</option>
                            <option value="smokey-eyes">Smokey Eyes - $1200</option>
                        </select>
                    </div>

                    <!-- Wrapper oculto para el input de fecha (para enviar con el form) -->
                    <input type="hidden" name="fecha" id="bookingDateInput" required>

                    <!-- SECCIÓN DINÁMICA: Calendario y Selección de Horas -->
                    <div class="booking-layout">
                        <!-- Sección del Calendario -->
                        <div class="calendar-section">
                            <div class="calendar-container">
                                <div class="calendar-header">
                                    <button type="button" class="calendar-nav-btn" id="prevMonth">&lt;</button>
                                    <h3 id="calendarMonthYear">Mes Año</h3>
                                    <button type="button" class="calendar-nav-btn" id="nextMonth">&gt;</button>
                                </div>
                                <div class="calendar-grid-header">
                                    <div>Dom</div>
                                    <div>Lun</div>
                                    <div>Mar</div>
                                    <div>Mié</div>
                                    <div>Jue</div>
                                    <div>Vie</div>
                                    <div>Sáb</div>
                                </div>
                                <div class="calendar-grid" id="calendarGrid">
                                    <!-- JS generará los días aquí -->
                                </div>
                            </div>

                            <!-- Time Slots (Debajo del calendario) -->
                            <div class="hours-container" id="hoursGrid" style="display: none;">
                                <p style="color: #666; margin-bottom: 1rem; text-align: center; font-size: 0.9rem;">
                                    HORAS DISPONIBLES PARA <span id="selectedDateDisplay"
                                        style="color:#fff; font-weight: 500;"></span>
                                </p>
                                <div class="hours-grid" id="hoursGridContainer">
                                    <!-- JS generará las horas -->
                                </div>
                            </div>
                        </div>

                        <!-- Lista de Citas (Debajo del calendario en desktop también) -->
                        <div class="appointments-section">
                            <h4 class="list-header">Citas Agendadas</h4>
                            <div id="appointmentList" class="appointment-list-grid">
                                <p style="color: #444; text-align: center; grid-column: 1/-1;">Cargando...</p>
                            </div>
                            <div id="viewMoreContainer" style="text-align: center; margin-top: 15px; display: none;">
                                <button type="button" id="viewMoreBtn" class="add-cart"
                                    style="width: auto; padding: 5px 20px;">Ver más</button>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 3rem;">
                        <button type="submit" class="cta-button" style="width: 100%; max-width: 400px;">Confirmar
                            Reserva</button>
                    </div>
                </form>
            </div>
        </section>
    <?php endif; ?>

    <!-- Cajón del Carrito -->
    <div id="cart-drawer" class="cart-drawer">
        <div class="cart-header">
            <h3>Tu Carrito</h3>
            <button id="close-cart">&times;</button>
        </div>
        <div id="cart-items" class="cart-items">
            <!-- Los artículos se añaden aquí -->
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="total-price">$0</span>
            </div>
            <button class="checkout-btn">Finalizar Compra</button>
        </div>
    </div>
    <div id="cart-overlay" class="cart-overlay"></div>

    <footer class="footer section-padding">
        <div class="container">
            <div class="footer-grid"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; border-top: 1px solid #222; padding-top: 40px;">
                <div class="footer-brand">
                    <h3 style="color: #fff; margin-bottom: 15px;">GLOW BELLEZA</h3>
                    <p style="color: #888; font-size: 0.9rem;">Resaltando tu belleza natural con exclusividad y
                        elegancia en cada detalle.</p>
                </div>
                <div class="footer-links">
                    <h4 style="color: #fff; margin-bottom: 15px;">Enlaces</h4>
                    <ul style="list-style: none; padding: 0; line-height: 2;">
                        <li><a href="#" style="color: #888; text-decoration: none;">Inicio</a></li>
                        <li><a href="#booking" style="color: #888; text-decoration: none;">Reservas</a></li>
                        <li><a href="#contact" style="color: #888; text-decoration: none;">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4 style="color: #fff; margin-bottom: 15px;">Contacto</h4>
                    <p style="color: #888; font-size: 0.9rem;">WhatsApp: +123 456 789</p>
                    <p style="color: #888; font-size: 0.9rem;">Email: info@glowbelleza.com</p>
                </div>
            </div>
            <div class="footer-bottom" style="text-align: center; margin-top: 50px; color: #555; font-size: 0.8rem;">
                <p>&copy; <?php echo date('Y'); ?> Glow Belleza. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        /**
         * LÓGICA DE RESERVAS Y CALENDARIO (Frontend)
         * Este script se encarga de:
         * 1. Cargar las citas existentes desde el servidor (AJAX).
         * 2. Dibujar el calendario mes a mes.
         * 3. Permitir seleccionar un día y consultar las horas disponibles.
         * 4. Manejar el carrito de compras persistente.
         */
        document.addEventListener('DOMContentLoaded', async () => {
            const calendarGrid = document.getElementById('calendarGrid');
            const monthYearTitle = document.getElementById('calendarMonthYear');
            const prevBtn = document.getElementById('prevMonth');
            const nextBtn = document.getElementById('nextMonth');
            const bookingDateInput = document.getElementById('bookingDateInput');
            const selectedDateDisplay = document.getElementById('selectedDateDisplay');
            const hoursGrid = document.getElementById('hoursGrid');
            const hoursGridContainer = document.getElementById('hoursGridContainer');
            const selectedHoraInput = document.getElementById('selectedHora');
            const appointmentList = document.getElementById('appointmentList');
            const viewMoreContainer = document.getElementById('viewMoreContainer');
            const viewMoreBtn = document.getElementById('viewMoreBtn');
            let showAllAppointments = false;

            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
            let reservations = [];

            // Horas de trabajo
            const businessHours = [
                "09:00", "10:00", "11:00", "12:00", "13:00",
                "14:00", "15:00", "16:00", "17:00", "18:00"
            ];

            // 1. Obtener Reservas
            async function fetchReservations() {
                try {
                    const res = await fetch('api_reservations.php');
                    reservations = await res.json();
                    renderAppointmentList();
                    renderCalendar(currentMonth, currentYear);
                } catch (err) {
                    console.error("Error loading reservations:", err);
                    appointmentList.innerHTML = '<p style="color:red; font-size:0.8rem;">Error cargando citas.</p>';
                }
            }

            // 2. Renderizar Lista de Citas (Minimalista, Enfocado en la Privacidad)
            function renderAppointmentList() {
                appointmentList.innerHTML = '';

                // Filtrar solo las futuras (desde hoy en adelante)
                const todayStr = new Date().toISOString().split('T')[0];
                const upcoming = reservations.filter(r => r.fecha >= todayStr);

                if (upcoming.length === 0) {
                    appointmentList.innerHTML = '<p style="color:#444; font-style:italic; grid-column: 1/-1; text-align:center;">No hay citas próximas.</p>';
                    viewMoreContainer.style.display = 'none';
                    return;
                }

                // Determinar cuántos mostrar
                const limit = 4;
                const itemsToShow = showAllAppointments ? upcoming : upcoming.slice(0, limit);

                if (upcoming.length > limit) {
                    viewMoreContainer.style.display = 'block';
                    viewMoreBtn.textContent = showAllAppointments ? 'Ver menos' : 'Ver más';
                } else {
                    viewMoreContainer.style.display = 'none';
                }

                itemsToShow.forEach(res => {
                    const item = document.createElement('div');
                    item.className = 'appointment-item';

                    const dateParts = res.fecha.split('-');
                    const dateObj = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
                    const dateStr = dateObj.toLocaleDateString('es-ES', { day: 'numeric', month: 'short' });
                    const timeStr = res.hora.substring(0, 5);

                    item.innerHTML = `
                        <div class="appt-date">${dateStr}</div>
                        <div class="appt-time">${timeStr}</div>
                    `;
                    appointmentList.appendChild(item);
                });
            }

            // Manejador del botón Ver más
            if (viewMoreBtn) {
                viewMoreBtn.addEventListener('click', () => {
                    showAllAppointments = !showAllAppointments;
                    renderAppointmentList();
                });
            }

            // 3. Renderizar Calendario
            function renderCalendar(month, year) {
                calendarGrid.innerHTML = '';

                // Título
                const monthName = new Date(year, month).toLocaleDateString('es-ES', { month: 'long' });
                monthYearTitle.textContent = `${monthName.charAt(0).toUpperCase() + monthName.slice(1)} ${year}`;

                const firstDay = new Date(year, month, 1).getDay(); // 0 es Domingo
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                // Espacios vacíos para el mes anterior
                for (let i = 0; i < firstDay; i++) {
                    const empty = document.createElement('div');
                    empty.className = 'calendar-day empty';
                    calendarGrid.appendChild(empty);
                }

                // Días
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayCell = document.createElement('div');
                    dayCell.className = 'calendar-day';

                    // Formato AAAA-MM-DD
                    const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                    // Comprobar si es hoy
                    const todayStr = new Date().toISOString().split('T')[0];
                    if (dateString === todayStr) dayCell.classList.add('today');

                    // Comprobar reservas (Indicador de punto minimalista)
                    const dayReservations = reservations.filter(r => r.fecha === dateString);
                    const hasReservation = dayReservations.length > 0;

                    let html = `<span class="day-number">${day}</span>`;

                    if (hasReservation) {
                        html += `<div class="day-marker"></div>`;
                    }

                    dayCell.innerHTML = html;

                    // Evento de Clic
                    dayCell.addEventListener('click', () => {
                        // Lógica de selección
                        document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                        dayCell.classList.add('selected');

                        bookingDateInput.value = dateString;

                        // Formato de fecha de visualización
                        const dateParts = dateString.split('-');
                        const dateObj = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
                        selectedDateDisplay.textContent = dateObj.toLocaleDateString('es-ES', { weekday: 'long', day: 'numeric', month: 'long' });

                        loadHours(dateString);
                    });

                    calendarGrid.appendChild(dayCell);
                }
            }

            // 4. Lógica de Carga de Horas
            async function loadHours(fecha) {
                hoursGrid.style.display = 'block';
                hoursGridContainer.innerHTML = '<p style="color:#666; font-size:0.8rem;">Cargando...</p>';
                selectedHoraInput.value = "";

                try {
                    const response = await fetch(`api_availability.php?fecha=${fecha}`);
                    const data = await response.json();
                    const reserved = data.reserved || [];

                    hoursGridContainer.innerHTML = '';

                    // Comprobar fecha pasada
                    const dateParts = fecha.split('-');
                    const checkDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    if (checkDate < today) {
                        hoursGridContainer.innerHTML = '<p style="color:#444; text-align:center; width:100%;">No disponible</p>';
                        return;
                    }

                    businessHours.forEach(hora => {
                        const btn = document.createElement('div');
                        btn.classList.add('time-slot');

                        // Comprobar disponibilidad
                        // Nota: el backend suele devolver H:i:s, o H:i. Vamos a hacer una coincidencia difusa para estar seguros o asumiendo que el formato coincide
                        const isReserved = reserved.some(r => r.startsWith(hora));

                        if (isReserved) {
                            btn.classList.add('reserved');
                            btn.textContent = hora; // Just time, crossed out via CSS
                        } else {
                            btn.classList.add('available');
                            btn.textContent = hora;
                            btn.addEventListener('click', () => {
                                document.querySelectorAll('.time-slot.selected').forEach(el => el.classList.remove('selected'));
                                btn.classList.add('selected');
                                selectedHoraInput.value = hora;
                            });
                        }
                        hoursGridContainer.appendChild(btn);
                    });

                } catch (error) {
                    console.error(error);
                    hoursGridContainer.innerHTML = '<p style="color:red">Error.</p>';
                }
            }

            // Navegación
            if (prevBtn) prevBtn.addEventListener('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar(currentMonth, currentYear);
            });

            if (nextBtn) nextBtn.addEventListener('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar(currentMonth, currentYear);
            });

            // Enviar Reserva
            if (bookingForm) {
                bookingForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    if (!bookingDateInput.value || !selectedHoraInput.value) {
                        alert('Por favor selecciona una fecha y una hora.');
                        return;
                    }

                    const formData = new FormData(bookingForm);
                    try {
                        const response = await fetch('n8n_send_data.php', {
                            method: 'POST',
                            body: formData
                        });
                        const result = await response.json();

                        if (result.success) {
                            const successModal = document.getElementById('success-modal');
                            if (successModal) successModal.style.display = 'flex';
                            fetchReservations(); // Refrescar lista
                        } else {
                            alert('Error: ' + result.message);
                        }
                    } catch (err) {
                        console.error('Error enviando reserva:', err);
                    }
                });
            }

            // --- Lógica del Carrito de Compras ---
            const cartBtn = document.getElementById('cart-btn');
            const cartDrawer = document.getElementById('cart-drawer');
            const cartOverlay = document.getElementById('cart-overlay');
            const closeCart = document.getElementById('close-cart');
            const cartItemsContainer = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const totalPriceEl = document.getElementById('total-price');

            let cart = JSON.parse(localStorage.getItem('glow_cart') || '[]');

            function updateCartUI() {
                cartItemsContainer.innerHTML = '';
                let total = 0;

                cart.forEach((item, index) => {
                    total += item.price;
                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'cart-item';
                    itemDiv.innerHTML = `
                        <div class="cart-item-info">
                            <h5>${item.name}</h5>
                            <span class="price">$${item.price}</span>
                        </div>
                        <button class="remove-item" onclick="removeFromCart(${index})">Eliminar</button>
                    `;
                    cartItemsContainer.appendChild(itemDiv);
                });

                if (cartCount) cartCount.textContent = cart.length;
                if (totalPriceEl) totalPriceEl.textContent = `$${total}`;
                localStorage.setItem('glow_cart', JSON.stringify(cart));
            }

            window.addToCart = (name, price) => {
                cart.push({ name, price });
                updateCartUI();
                openCartDrawer();
            };

            window.removeFromCart = (index) => {
                cart.splice(index, 1);
                updateCartUI();
            };

            function openCartDrawer() {
                cartDrawer.classList.add('open');
                cartOverlay.classList.add('open');
            }

            function closeCartDrawer() {
                cartDrawer.classList.remove('open');
                cartOverlay.classList.remove('open');
            }

            if (cartBtn) cartBtn.addEventListener('click', openCartDrawer);
            if (closeCart) closeCart.addEventListener('click', closeCartDrawer);
            if (cartOverlay) cartOverlay.addEventListener('click', closeCartDrawer);

            // Lógica de Compra (Finalizar Compra)
            const checkoutBtn = document.querySelector('.checkout-btn');
            if (checkoutBtn) {
                checkoutBtn.addEventListener('click', async () => {
                    if (cart.length === 0) {
                        alert('Tu carrito está vacío.');
                        return;
                    }

                    const total = cart.reduce((sum, item) => sum + item.price, 0);

                    try {
                        const response = await fetch('api_create_invoice.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ cart, total })
                        });
                        const result = await response.json();

                        if (result.success) {
                            showInvoice(result.invoice);
                            cart = [];
                            updateCartUI();
                            closeCartDrawer();
                        } else {
                            alert('Error al procesar la compra: ' + result.message);
                        }
                    } catch (err) {
                        console.error('Error en el checkout:', err);
                    }
                });
            }

            function showInvoice(invoice) {
                document.getElementById('inv-nro').textContent = invoice.nro;
                document.getElementById('inv-fecha').textContent = invoice.fecha;
                document.getElementById('inv-cliente').textContent = invoice.cliente;
                document.getElementById('inv-total').textContent = `$${invoice.total}`;

                const itemsTable = document.getElementById('inv-items');
                itemsTable.innerHTML = '';
                invoice.items.forEach(item => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td>${item.name}</td><td>$${item.price}</td>`;
                    itemsTable.appendChild(tr);
                });

                document.getElementById('invoice-modal').style.display = 'flex';
            }

            document.getElementById('close-invoice').addEventListener('click', () => {
                document.getElementById('invoice-modal').style.display = 'none';
            });

            document.getElementById('close-success-modal').addEventListener('click', () => {
                document.getElementById('success-modal').style.display = 'none';
            });

            // Añadir eventos de clic a los botones "Añadir" en los productos
            document.querySelectorAll('.product-card').forEach(card => {
                const btn = card.querySelector('.add-cart');
                const name = card.querySelector('h3').textContent;
                const price = parseInt(card.querySelector('.price').textContent.replace('$', ''));

                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    addToCart(name, price);
                });
            });

            updateCartUI();


            // Inicio
            await fetchReservations();
        });
    </script>


    <!-- Modal de Éxito de Reserva -->
    <div id="success-modal" class="modal-notification">
        <div class="modal-content">
            <div class="checkmark-wrapper">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
            <h3>¡Reserva Exitosa!</h3>
            <p id="success-modal-msg">Tu cita ha sido confirmada con éxito.</p>
            <button id="close-success-modal" class="cta-button">Entendido</button>
        </div>
    </div>

    <!-- Modal de Factura -->
    <div id="invoice-modal" class="modal-notification" style="display: none;">
        <div class="modal-content invoice-content">
            <div class="invoice-header">
                <span class="logo-text">LUXURY GLOW</span>
                <h4>Comprobante de Compra</h4>
            </div>
            <div class="invoice-details">
                <p><strong>Nro:</strong> <span id="inv-nro"></span></p>
                <p><strong>Fecha:</strong> <span id="inv-fecha"></span></p>
                <p><strong>Cliente:</strong> <span id="inv-cliente"></span></p>
            </div>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="inv-items">
                    <!-- Items de la factura -->
                </tbody>
            </table>
            <div class="invoice-total">
                Total: <span id="inv-total"></span>
            </div>
            <div class="invoice-footer">
                <p>¡Muchas gracias por su compra!</p>
                <button id="close-invoice" class="cta-button">Cerrar</button>
            </div>
        </div>
    </div>

    <!-- Botón Volver Arriba -->
    <button id="scroll-top-btn" class="scroll-top-btn" aria-label="Volver arriba">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    <script src="script.js"></script>
</body>

</html>