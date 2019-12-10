<?php
declare(strict_types=1);
/**
 *
 * PHP version 7.3
 *
 * LICENSE:
 * This file is part of person_db_skeleton which is a set of skeleton database
 * tables for people and common associated data.
 *
 * Copyright (C) 2019 Michael Cummings. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation and/or
 * other materials provided with the distribution.
 *
 * 3. Neither the name of the copyright holder nor the names of its contributors
 * may be used to endorse or promote products derived from this software without
 * specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * You should have received a copy of the BSD-3 Clause License along with
 * this program. If not, see
 * <https://spdx.org/licenses/BSD-3-Clause.html>.
 *
 * You should be able to find a copy of this license in the LICENSE file.
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 Michael Cummings
 * @license   BSD-3-Clause
 */

namespace PersonDBSkeleton\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use PersonDBSkeleton\Utils\Uuid4;

/**
 * Genders
 *
 * @ORM\Table(
 *     name="genders",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="unq_g_gender", columns={"sex", "gender_identity"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="PersonDBSkeleton\Model\Repositories\GendersRepository")
 */
class Genders {
    use EntityCommon;
    use Uuid4;
    /**
     * Genders constructor.
     *
     * @param string $sex
     *
     * @throws \Exception
     */
    public function __construct(string $sex) {
        $this->createdAt = new \DateTimeImmutable();
        $this->id = $this->asBase64();
        $this->sex = $sex;
    }
    /**
     * Get genderIdentity.
     *
     * @return string|null
     */
    public function getGenderIdentity(): ?string {
        return $this->genderIdentity;
    }
    /**
     * Get sex.
     *
     * @return string
     */
    public function getSex(): string {
        return $this->sex;
    }
    /**
     * @param string|null $value
     *
     * @return self Fluent interface
     */
    public function setGenderIdentity(?string $value): self {
        $this->genderIdentity = $value;
        return $this;
    }
    /**
     * @var string|null
     *
     * @ORM\Column(name="gender_identity", type="string", length=255, nullable=true)
     */
    private $genderIdentity;
    /**
     * @var string
     *
     * @ORM\Column(name="sex",
     *     type="string",
     *     length=10,
     *     nullable=false,
     *     options={"comment"="biological sex - One of Female, Male, Other, None/Not applicable, Unknown"}
     * )
     */
    private $sex;
}
